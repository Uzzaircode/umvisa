<?php

namespace Modules\Application\Traits;

use Modules\Application\Entities\FinancialAid;

trait Financials
{
    public function hasFinancialAid($request, $app)
    {
        if ($request->has('financial_instrument')) {
            foreach($request->financial_instrument as $f) {
                if (!empty($f)) {
                    FinancialAid::create([
                        'remarks' => $request->remarks,
                        'application_id' => $app->id,
                        'financialinstrument_id' => $request->financial_instrument,
                    ]);
                }
            }
        }

    }
}
