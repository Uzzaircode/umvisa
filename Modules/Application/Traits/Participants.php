<?php 

namespace Modules\Application\Traits;
use Modules\Application\Entities\Participant;
trait Participants
{
    public function hasParticipants($request, $app)
    {
        if ($request->has('matric_num')) {
            if ($request->filled('matric_num')) {
                $i = 0;
                for ($i;$i < count($request->matric_num); $i++) {
                    Participant::create([
                    'matric_num' => $request->matric_num[$i],
                    'application_id' => $app->id,
                ]);
                }
            }
        }
    }
}
