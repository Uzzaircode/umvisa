<?php 

namespace Modules\Application\Traits;

use Session;
use Carbon\Carbon;
use Auth;
use Illuminate\Notifications\Notification;
use Modules\Application\Notifications\SubmitApplication;
use Modules\Application\Notifications\ApproveApplication;
use App\User;
use DB;
use Illuminate\Support\Facades\URL;
use Modules\Application\Traits\Financials;
use Modules\Application\Traits\Participants;
use Modules\Application\Traits\Attachments;

trait Submission
{
    protected $modelClassName = "Modules\Application\Entities\Application";
    protected $applicationAttachmentModel = "Modules\Application\Entities\ApplicationAttachment";
    protected $totalDaysBeforeSubmission = 21;
    protected $attachmentDirectory = 'uploads/applicationsattachments';
    protected $draft;
    protected $draftMessage = 'Application created successfully';
    protected $saveMessage = 'Your application has been saved and sent to Immediate Supervisor';
    protected $updateMessage = 'Application details has been updated';
    protected $submitSupervisorMessage = "Submitted to Supervisor";
    protected $successRemarkMessage = "Your remark has been saved";
    protected $approveMessage = "The application has been approved";
    protected $rejectMessage = "The application has been rejected";

    public function checkForLateSubmission($app)
    {
        if ($this->getTotalDaysBeforeSubmission($app) < $this->totalDaysBeforeSubmission) {
            $app->comment([
                'title' => 'Late Submission',
                'body' => $this->getLateMessageText(),
            ], $this->admin());
        }
    }

    public function getLateMessageText()
    {
        return DB::table('applicationconfigs')->where('name', 'late_message')->first()->value;
    }

    public function checkLateSubmmisionComment($app)
    {
        $comments = $app->comments->toArray();
        if (in_array('Late Submission', $comments)) {
            return true;
        }
    }
    // draft application
    public function draft($request, $app)
    {
        //draft
        if ($request->has('draft')) {
            $app->setStatus('Draft', 'Successfully created');
            $state = DB::table('statuses')->where('model_id', $app->id)->update(['state' => 'success']);
            Session::flash('success', 'Application created successfully');
        }
    }

    public function save($request, $app)
    {
        //save
        if ($request->has('save')) {
            $app->setStatus('Submitted To Supervisor', 'Submitted to ' . $this->getSupervisorName($supervisor));
            $state = DB::table('statuses')->where('model_id', $app->id)->update(['state' => 'success']);
            $supervisor->notify(new SubmitApplication($app, $this->getApplicant($app)));
            Session::flash('success', $this->saveMessage);
        }
    }

    public function submit($request, $app)
    {
        $user = Auth::user();
        
        // if submit 'submit'
        if ($request->has('submit')) {
            // check for late submission
            $this->checkForLateSubmission($app);
            $supervisor = $this->getSupervisor($request);
            $supervisor->notify(new SubmitApplication($app, $user));
            $app->setStatus('Submitted To Supervisor', 'Submitted to ' . $supervisor->profile->title . ' ' . $supervisor->name);
            $state = DB::table('statuses')->where('model_id', $app->id)->update(['state' => 'success']);
            DB::table('application_user')->insert([
                'application_id' => $app->id,
                'user_id' => $supervisor->id,
            ]);
            Session::flash('success', 'Your application has been sent');
        }
    }

    public function getSupervisor($request)
    {
        $supervisor_email = $request->supervisor;
        return $supervisor = User::where('email', $supervisor_email)->first();
    }

    public function getSupervisorName($supervisor)
    {
        return $supervisor->first()->profile->title . ' ' . $supervisor->first()->name;
    }
    // update draft
    public function updateDraft($request, $app)
    {
        // if update draft
        if ($request->has('draft')) {
            $this->updateFromRequest($request, $app);
            Session::flash('success', 'Application information updated successfully');
        }
    }

    public function checkTravelType($request, $app)
    {
        if ($request->country == 'Malaysia') {
            $app->travel_type = 'local';
        } else {
            $app->travel_type = 'overseas';
        }
        $app->save();
    }
    public function getTotalDaysBeforeSubmission($app)
    {
        return Carbon::now()->diffInDays(Carbon::parse(strtotime($app->start_date)));
    }

    public function admin()
    {
        return User::find(19);
    }
    public function updateFromRequest($request, $app)
    {
        $app->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'venue' => $request->venue,
            'state' => $request->state,
            'country' => $request->country,
            'description' => $request->description,
            'event_start_date' => $request->event_start_date,
            'event_end_date' => $request->event_end_date,
            'travel_start_date' => $request->travel_start_date,
            'travel_end_date' => $request->travel_end_date,
            'alternate_email' => $request->alternate_email,
            'type' => $request->type,
            'event_type' => $request->event_type,
            'travel_type' => $request->travel_type
        ]);
    }

    public function saveRemarks($request, $id)
    {
        $app = $this->modelClassName::find($id);
        
        // if save remarks
        if ($request->has('save_remarks')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            // notifies Deputy Dean
            $deputyDean = $this->getDeputyDean();
            $deputyDean->notify(new SubmitApplication($app, $this->getApplicant($app)));
            //Set status
            $app->setStatus('Submitted To Deputy Dean', 'Submitted to ' . $this->getDeputyDeanName($deputyDean) . '');
            Session::flash('success', $this->successRemarkMessage);
        }

        // if approve
        if ($request->has('approve')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Approved', 'Approved by ' . $this->getDeputyDeanName($deputyDean));
            $user->notify(new ApproveApplication($app, $user));
            Session::flash('success', $this->approveMessage);
        }
        // if reject
        if ($request->has('reject')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Rejected', 'Rejected by ' . $this->getDeputyDeanName($deputyDean));
            $user->notify(new RejectApplication($app, $user));
            Session::flash('success', $this->rejectMessage);
        }
        $url = URL::signedRoute('applications.show', ['id' => $id]);
        return redirect($url);
    }

    public function getApplicant($app)
    {
        return $app->user;
    }

    public function getDeputyDeanName($deputyDean)
    {
        return $deputyDean->profile->title . ' ' . $deputyDean->name;
    }

    public function getDeputyDean()
    {
        return $this->user->role('Deputy Dean')->get()->first();
    }
}
