<?php 

namespace Modules\Application\Traits;

trait Attachments{
    public function hasAttachments($request, $app)
    {
        if ($request->hasFile('attachments')) {
            // $repo->uploadFiles(['files'], $ticket);
            foreach ($request->file('attachments') as $file) {
                // save the attachment with event title and time as prefix
                $filename = time() . $file->getClientOriginalName();
                // move the attachements to public/uploads/applicationsattachments folder
                $file->move($this->attachmentDirectory, $filename);
                // create attachement record in database, attach it to Ticket ID
                $this->applicationAttachmentModel::create([
                    'application_id'=>$app->id,
                    'path'=>$this->attachmentDirectory.'/'.$filename
                    ]);
            }
        }
    }
}