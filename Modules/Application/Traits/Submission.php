<?php 

namespace Modules\Application\Traits;

use Session;
use Modules\Application\Notifications\SubmitApplication;
use App\User;
use DB;
use Carbon\Carbon;

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
            $supervisor->notify(new SubmitApplication($app, $this->getApplicant($app)));
            Session::flash('success', $this->saveMessage);
        }
    }
    
    // update draft
    public function updateDraft($request, $app)
    {
        // if update draft
        if ($request->has('draft')) {
            $this->updateFromRequest($request, $app);
            $app->save();
            Session::flash('success', $this->updateMessage);
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
}
