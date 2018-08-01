<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Application\Entities\FinancialAid;

class FinancialInstrument extends Model
{
    protected $table = 'financialinstruments';
    protected $fillable = ['name'];

    public function financialaid(){
        return $this->belongsTo(FinancialAid::class);
    }
}
