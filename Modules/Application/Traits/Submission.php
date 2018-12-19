<?php 

namespace Modules\Application\Traits;

use Session;
use Modules\Application\Notifications\SubmitApplication;
use App\User;
use DB;
use Carbon\Carbon;
use Auth;

trait Submission
{

    protected $totalDaysBeforeSubmission = '21';

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
            Session::flash('success', $this->saveMessage);
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

}
