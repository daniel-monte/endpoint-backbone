<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    protected $primaryKey = 'key';

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
}
