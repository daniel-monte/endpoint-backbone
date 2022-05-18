<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SettlementType;

class Settlement extends Model
{
    protected $primaryKey = 'key';

  
    public function getZoneTypeAttribute($value)
    {
        return strtoupper($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function settlement_type()
    {
        return $this->hasOne(SettlementType::class, 'name', 'settlement_type');
    }
}
