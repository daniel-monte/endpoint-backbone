<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Support\Facades\Cache;

class ZipCodeController extends Controller
{
    public function getZipCode($zip_code)
    {
        if(strlen($zip_code) == 4)
            $zip_code= $this->addPrefix($zip_code);
                
        if (Cache::has($zip_code)){
            $zipCode = Cache::get($zip_code);
        }else{

            if($zipCode = ZipCode::where('zip_code', $zip_code)
            ->with(['federalEntity', 'settlements.settlement_type', 'municipality'])
            ->first()){

                return $zipCode;

            }else{
                return response()
                    ->json(['code'=>404, 'message'=> 'Not Found']);
            }      
            
            Cache::put($zip_code, $zipCode, 15);
        }
 
    }

    public function addPrefix($str){
        $result = "0".$str;
        return $result;
    }
}
