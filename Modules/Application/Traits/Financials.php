<?php

namespace Modules\Application\Traits;

use Modules\Application\Entities\FinancialAid;

trait Financials
{
    public function hasFinancialAid($request, $app)
    {
        // $remarks = collect($request->remarks);
        // $remarks->each(function($r){
        //     if($r->isNotEmpty()){
        //         $f = new FinancialAid;
        //         $f->remarks = $request->remarks;
        //         $f->application_id = $app->id;
        //         $f->financialinstrument_id = $request->financial_instrument;
        //         $f->save();   
        //     }
        // });
        // if($remarks->isNotEmpty()) {
        //     $f = new FinancialAid;
        //     $f->remarks = $request->remarks[$i];
        //     $f->application_id = $app->id;
        //     $f->financialinstrument_id = $request->financial_instrument[$i];
        //     $f->save();
        // } 
        
        // if ($request->has('financial_instrument')) {
            $i = 0;
            for ($i;$i < count($request->remarks); $i++) {
                if (!empty($request->remarks[$i])) {
                    // FinancialAid::create([
                    //         'remarks' => $request->remarks[$i],
                    //         'application_id' => $app->id,
                    //         'financialinstrument_id' => $request->financial_instrument[$i],
                    //     ]);
                    $f = new FinancialAid;
                    $f->remarks = $request->remarks[$i];
                    $f->application_id = $app->id;
                    $f->financialinstrument_id = $request->financial_instrument[$i];
                    $f->save();
                }
            }
        // }
    }
}
