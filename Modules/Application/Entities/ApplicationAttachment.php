<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;

class ApplicationAttachment extends Model
{
    protected $table = 'ticketattachments';
    protected $guarded = [];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
