<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Model;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ZipCode extends Model
{


    protected $hidden = ['id'];


    public function getLocalityAttribute($value)
    {
        return strtoupper($value);
    }

    public function getMunicipalityAttribute($value)
    {
        return strtoupper($value);
    }

    public function getFederalEntityAttribute($value)
    {
        return strtoupper($value);
    }

    
    /*
    |-------------------------------------------------------------------------------
    | Relations
    |-------------------------------------------------------------------------------
    */

    public function federalEntity()
    {
        return $this->hasOne(FederalEntity::class, 'name', 'federal_entity');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class, 'zip_code', 'zip_code');
    }

    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'name', 'municipality');
    }


}



