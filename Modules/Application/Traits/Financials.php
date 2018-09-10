<?php

namespace Modules\Application\Traits;

use Modules\Application\Entities\FinancialAid;

trait Financials
{
    public function hasFinancialAid($request, $app)
    {

        foreach ($request->input('remarks') as $f => $val) {
            if (!empty($val)) {
                FinancialAid::create([
                    'remarks' => $val,
                    'application_id' => $app->id,
                    'financialinstrument_id' => $request->financial_instrument[$f],
                ]);
            }
        }

    }
}
