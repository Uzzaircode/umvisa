<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Application\Entities\FinancialInstrument;

class FinancialAid extends Model
{
    protected $table = 'financialaids';
    protected $fillable = ['application_id','financialinstrument_id','remarks'];

    public function financialinstrument(){
        return $this->belongsTo(FinancialInstrument::class,'financialinstrument_id');
    }
    public function application(){
        return $this->belongsTo(Application::class,'application_id');
    }
}
