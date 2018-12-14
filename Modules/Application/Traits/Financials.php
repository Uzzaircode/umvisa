<?php

namespace Modules\Application\Traits;

use Modules\Application\Entities\FinancialAid;

trait Financials
{
    public function hasFinancialAid($request, $app)
    {
        for ($i = 0; $i < count($request->remarks); ++$i) {
            if ($request->has('financial_instrument')) {
                FinancialAid::create([
                    'remarks' => $request->remarks[$i],
                    'application_id' => $app->id,
                    'financialinstrument_id' => $request->financial_instrument[$i],
                ]);
            }
        }

    }
}
