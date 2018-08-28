<?php 

namespace Modules\Application\Traits;
use Session;

trait Submission
{
    public function checkForLateSubmission($app)
    {
        if ($this->getTotalDaysBeforeSubmission($app) < $this->totalDaysBeforeSubmission) {
            $app->comment([
                'title'=>'Late Submission',
                'body' => 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than '.$this->totalDaysBeforeSubmission.' days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.',
            ], $this->admin());
        }
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
            Session::flash('success', $this->draftMessage);
        }
    }

    
    // save application
    public function save($request, $app)
    {
        //save
        if ($request->has('save')) {
            //check for late submission
            $this->checkForLateSubmission($app);
            $supervisor = $this->getSupervisor($app);
            $app->setStatus('Submitted To Supervisor', 'Submitted to '.$this->getSupervisorName($supervisor));
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
            $this->hasFinancialAid($request, $app);
            $app->save();
            Session::flash('success', $this->updateMessage);
        }
    }


    // submit application
    public function submit($request, $app)
    {
        $user = $app->user;
        
        // if submit 'submit'
        if ($request->has('submit')) {
            // check for late submission
            $this->checkForLateSubmission($app);
            $supervisor = $this->getSupervisor($app);
            $supervisor->notify(new SubmitApplication($app, $user));
            $app->setStatus('Submitted To Supervisor', 'Submitted to '.$this->getSupervisorName($supervisor));
            Session::flash('success', $this->saveMessage);
        }
    }
}
