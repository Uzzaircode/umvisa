<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    protected $fillable = ['application_id','matric_num'];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
