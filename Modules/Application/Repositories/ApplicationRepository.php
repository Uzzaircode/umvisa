<?php
namespace Modules\Application\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\User;
use Carbon\Carbon;
use Session;

class ApplicationRepository extends AbstractRepository implements ApplicationInterface{

    protected $modelClassName = "Modules\Application\Entities\Application";
    protected $applicationAttachmentModel = "Modules\Application\Entities\ApplicationAttachment";
    protected $totalDaysBeforeSubmission = 21;
    protected $draft;
    protected $draftMessage = 'Success';

    public function saveApplication($request){

        $app = $this->modelClassName::create([
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
        
        $this->hasAttachments($request,$app);

        switch ($request->has('action')) {
            case 'draft':
            $app->setStatus('Draft', 'Successfully created');
            $app->save();
            Session::flash('success', $this->draftMessage);   
            break;
            case 'save':
            $app->setStatus('Submitted');
            Session::flash('success', $this->draftMessage);   
            break;
        }
        if($this->getTotalDaysBeforeSubmission($app) < $this->totalDaysBeforeSubmission){
            $app->comment([
                'body' => 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than '.$this->$totalDaysBeforeSubmission.' days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.',
            ],$this->admin());
        }
    }

    public function hasAttachments($request,$app){

        if ($request->hasFile('attachments')) {
            // $repo->uploadFiles(['files'], $ticket);
            foreach ($request->file('attachments') as $file) {
                // save the attachment with event title and time as prefix
                $filename = trim($app->title) . '-' . time() . $file->getClientOriginalName();
                // move the attachements to public/uploads/applicationsattachments folder
                $file->move('uploads/applicationsattachments', $filename);
                // create attachement record in database, attach it to Ticket ID
                $this->applcationAttachmentModel->create([
                    'application_id'=>$app->id,
                    'path'=>'uploads/applicationsattachments/'.$filename
                    ]);
            }
        }
    }

    public function getTotalDaysBeforeSubmission($app){
        $start_date = Carbon::parse($app->start_date);
        return $totalDays = Carbon::now()->diffInDays($start_date);

    }

    public function admin(){
        return $admin = User::role('Admin')->get()->first();
    }   
}