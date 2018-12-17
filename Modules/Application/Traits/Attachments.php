<?php 

namespace Modules\Application\Traits;

use Modules\Application\Entities\ApplicationAttachment;

trait Attachments
{
    public function hasAttachments($request, $app)
    {
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                if (!empty($file)) {
               // save the attachment with event title and time as prefix
                    $filename = time() . $file->getClientOriginalName();
               // move the attachements to public/uploads/applicationsattachments folder
                    $file->move('uploads/applicationsattachments', $filename);
               // create attachement record in database, attach it to Ticket ID
                    ApplicationAttachment::create([
                        'application_id' => $app->id,
                        'path' => 'uploads/applicationsattachments/' . $filename
                    ]);
                }
            }
        }
    }
}