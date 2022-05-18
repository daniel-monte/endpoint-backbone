<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Support\Facades\Cache;

class ZipCodeController extends Controller
{

    public function getZipCode($zip_code)
    {
        if (Cache::has($zip_code)){
            $zipCode = Cache::get($zip_code);
        }else{

            $zipCode = ZipCode::where('zip_code', $zip_code)
                ->with(['federalEntity', 'settlements.settlement_type', 'municipality'])
                ->first();

            Cache::put($zip_code, $zipCode, 15);
        }
            
        return $zipCode;
    }


}
