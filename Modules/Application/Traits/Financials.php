<?php 

namespace Modules\Application\Traits;
use Modules\Application\Entities\FinancialAid;

trait Financials{

    public function hasFinancialAid($request, $app)
    {
        
        if ($request->has('financial_instrument')) {
            if($request->filled('financial_instrument')){
                $i = 0;
                for ($i;$i < count($request->financial_instrument); $i++) {
                    FinancialAid::create([
                    'remarks' => $request->remarks[$i],
                    'application_id' => $app->id,
                    'financialinstrument_id' => $request->financial_instrument[$i],
                ]);
                }
            }
           
        }        
    }
}