<?php

namespace Modules\Application\Traits;

use Modules\Application\Entities\FinancialAid;
use DB;
trait Financials
{
    public function hasFinancialAid($request, $app)
    {
        $count = count($request->financial_instrument);

        if (!empty($request->financial_instrument)) {
            for ($i = 0; $i < $count; $i++) {
                $data[] = array(
                    'remarks' => $request->remarks[$i],
                    'application_id' => $app->id,
                    'financialinstrument_id' => $request->financial_instrument[$i],
                );
            }
        }

        DB::table('financialaids')->insert($data);
    }
}
