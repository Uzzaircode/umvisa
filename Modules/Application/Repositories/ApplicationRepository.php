<?php
namespace Modules\Application\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Modules\Application\Notifications\SubmitApplication;
use Modules\Application\Notifications\ApproveApplication;
use Illuminate\Support\Facades\URL;
use Modules\Application\Entities\FinancialAid;
use Session;
use Auth;
use Modules\Application\Entities\Participant;
use Modules\Application\Traits\Financials;
use Modules\Application\Traits\Participants;
use Modules\Application\Traits\Attachments;
use Modules\Application\Traits\Submission;

class ApplicationRepository extends AbstractRepository implements ApplicationInterface
{

    use Financials,Participants,Attachments,Submission;

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
        $this->checkForLateSubmission($app);
        //check if there is any attachments
        $this->hasAttachments($request, $app);
        $this->hasFinancialAid($request,$app);
        $this->hasParticipants($request,$app);
        // save it as draft or final
        $this->draft($request, $app);
        $this->save($request, $app);
    }

    public function createFromRequest($request)
    {
        return $this->modelClassName::create([
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
            'type' => $request->application_type,
        ]);
    }

    public function updateFromRequest($request, $app)
    {
        $app->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'venue' => $request->venue,
            'country' => $request->country,
            'state' => $request->state,
            'event_start_date' => $request->event_start_date,
            'event_end_date' => $request->event_end_date, 
            'travel_start_date' => $request->travel_start_date,
            'travel_end_date' => $request->travel_end_date,                       
        ]);
    }

    

    // update application
    public function updateApplication($id, $request)
    {
        // find application
        $app = $this->modelClassName::find($id);
        $this->updateFromRequest($request, $app);        
        $this->checkForLateSubmission($app);
        $this->hasAttachments($request,$app);
        $this->hasFinancialAid($request,$app);
        $this->hasParticipants($request,$app);
        $this->updateDraft($request, $app);
        $this->submit($request, $app);
    }

    // save remarks and send it to deputy dean
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
            $app->setStatus('Submitted To Deputy Dean', 'Submitted to '.$this->getDeputyDeanName($deputyDean).'');
            Session::flash('success', $this->successRemarkMessage);
        }

        // if approve
        if ($request->has('approve')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Approved', 'Approved by '.$this->getDeputyDeanName($deputyDean));
            $user->notify(new ApproveApplication($app, $user));
            Session::flash('success', $this->approveMessage);
        }
        // if reject
        if ($request->has('reject')) {
            $app->comment([
                'body' => $request->remark,
            ], Auth::user());
            $deputyDean = $this->getDeputyDean();
            $app->setStatus('Rejected', 'Rejected by '.$this->getDeputyDeanName($deputyDean));
            $user->notify(new RejectApplication($app, $user));
            Session::flash('success', $this->rejectMessage);
        }
        $url = URL::signedRoute('applications.show', ['id'=>$id]);
        return redirect($url);
    }

    public function getApplicant($app)
    {
        return $app->user;
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
        return $totalDays = Carbon::now()->diffInDays(Carbon::parse(strtotime($app->start_date)));
    }

    
}
