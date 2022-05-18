<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;

class ZipCodeController extends Controller
{

    public function getZipCode($zip_code)
    {
        $zipCode = ZipCode::where('zip_code', $zip_code)
            ->with(['federalEntity', 'settlements.settlement_type', 'municipality'])
            ->first();



            
        return $zipCode;
    }


}
