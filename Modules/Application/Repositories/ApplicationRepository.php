<?php
namespace Modules\Application\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Modules\Application\Notifications\SubmitApplication;
use Illuminate\Support\Facades\URL;
use Session;
use Auth;

class ApplicationRepository extends AbstractRepository implements ApplicationInterface
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

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function allApplications()
    {
        return $this->modelClassName::userApplication()->get();
    }

    public function saveApplication($request)
    {
        $app = $this->createFromRequest($request);
        //check if there is any attachments
        $this->hasAttachments($request, $app);
        // save it as draft or final
        $this->saveOrDraft($request, $app);
    }

    public function createFromRequest($request)
    {
        return $this->modelClassName::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'venue' => $request->venue,
            'country' => $request->country,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
            'financial_aid' => $request->financial_aid,
            'account_no_ref' => $request->account_no_ref,
            'sponsor_name' => $request->sponsor_name,
            'others_remarks' => $request->others_remarks,
        ]);
    }
    public function hasAttachments($request, $app)
    {
        if ($request->hasFile('attachments')) {
            // $repo->uploadFiles(['files'], $ticket);
            foreach ($request->file('attachments') as $file) {
                // save the attachment with event title and time as prefix
                $filename = trim($app->title) . '-' . time() . $file->getClientOriginalName();
                // move the attachements to public/uploads/applicationsattachments folder
                $file->move($this->attachmentDirectory, $filename);
                // create attachement record in database, attach it to Ticket ID
                $this->applicationAttachmentModel::create([
                    'application_id'=>$app->id,
                    'path'=>$this->attachmentDirectory.$filename
                    ]);
            }
        }
    }

    public function saveOrDraft($request, $app)
    {
        $user = $app->user;
        //draft
        if ($request->has('draft')) {
            $app->setStatus('Draft', 'Successfully created');
            $app->save();
            Session::flash('success', $this->draftMessage);
        }
        //save
        if ($request->has('save')) {
            //check for late submission
            $this->checkForLateSubmission($app);
            $supervisor = $this->getSupervisor($app);
            $app->setStatus('Submitted', 'Submitted to '.$this->getSupervisorName($supervisor));
            $app->save();
            $supervisor->notify(new SubmitApplication($app, $user));
            Session::flash('success', $this->saveMessage);
        }
    }

    public function updateFromRequest($request, $app)
    {
        return $app->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'venue' => $request->venue,
            'country' => $request->country,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
            'financial_aid' => $request->financial_aid,
            'account_no_ref' => $request->account_no_ref,
            'sponsor_name' => $request->sponsor_name,
            'others_remarks' => $request->others_remarks,
        ]);
    }
    
    public function updateOrSubmit($request, $app)
    {
        $user = $app->user;
        // if update draft        
        if ($request->has('draft')) {
            $this->updateFromRequest($app);
            $app->save();
            Session::flash('success', $this->updateMessage);
        }
        // if submit draft
        if ($request->has('submit')) {
            // check for late submission
            $this->checkForLateSubmission($app);
            $supervisor = $this->getSupervisor($app);
            $supervisor->notify(new SubmitApplication($app, $user));
            $app->setStatus('Submitted', 'Submitted to '.$this->getSupervisorName($supervisor));            
            Session::flash('success', $this->saveMessage);
        }
    }

    public function updateApplication($id, $request)
    {
        // find application
        $app = $this->modelClassName::find($id);
        $this->updateFromRequest($request, $app);
        $this->updateOrSubmit($request, $app);
    }

    // save remarks and send it to deputy dean
    public function saveRemarks($request, $id)
    {
        $app = $this->modelClassName::find($id);
        $user = $app->user;
        // if save remarks
        if ($request->save_remarks) {
            $app->comment([
            'body' => $request->remark,
        ], Auth::user());
            // notifies Deputy Dean
            $deputyDean = $this->getDeputyDean();
            $deputyDean->notify(new SubmitApplication($app, $user));
            //Set status
            $app->setStatus('Submitted', 'Submitted to '.$this->getDeputyDeanName($deputyDean).'');
            Session::flash('success', $this->successRemarkMessage);
        }

        // if approve
        if ($request->has('approve')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Approved', 'Approved by '.$this->getDeputyDeanName($deputyDean));                       
            $user->notify(new SubmitApplication($app,$user));
            Session::flash('success', $this->approveMessage);
        }
        // if reject
        if ($request->has('reject')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Rejected', 'Rejected by '.$this->getDeputyDeanName($deputyDean));
            $user->notify(new SubmitApplication($app,$user));
            Session::flash('success', $this->rejectMessage);
        }
        $url = URL::signedRoute('applications.show', ['id'=>$id]);
        return redirect($url);
    }

    public function getSupervisorName($supervisor)
    {
        return $supervisor->profile->title.' '.$supervisor->name;
    }

    public function admin()
    {
        return $admin = User::role('Admin')->get()->first();
    }
    
    public function getSupervisor($app)
    {
        return $supervisor = $app->user->profile->supervisor;
    }

    public function getDeputyDeanName($deputyDean)
    {
        return $deputyDean->profile->title.' '.$deputyDean->name;
    }

    public function getDeputyDean()
    {
        return $this->user->role('Deputy Dean')->get()->first();
    }

    
    public function getTotalDaysBeforeSubmission($app)
    {
        $start_date = Carbon::parse($app->start_date);
        return $totalDays = Carbon::now()->diffInDays($start_date);
    }

    public function checkForLateSubmission($app)
    {
        if ($this->getTotalDaysBeforeSubmission($app) < $this->totalDaysBeforeSubmission) {
            $app->comment([
                'body' => 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than '.$this->totalDaysBeforeSubmission.' days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.',
            ], $this->admin());
        }
    }
}
