<?php 

namespace Modules\Application\Traits;

use Modules\Application\Entities\Participant;

trait Participants
{
    public function hasParticipants($request, $app)
    {
        
        foreach ($request->input('matric_num') as $p => $val) {
            if (!empty($val)) {
                Participant::create([
                    'matric_num' => $val,
                    'application_id' => $app->id,                    
                ]);
            }
        }
    }
}
