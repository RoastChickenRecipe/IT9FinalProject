<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MunModel extends Model
{
    protected $table = 'municipalities';
    protected $fillable = ['mun_name', 'region'];

    public function MunToBrgy(){
        return $this->hasMany(BrgyModel::class, 'municipality_id');
    }

    public function MunToHhold(){
        return $this->hasMany(HouseholdModel::class, 'municipality_id');
    }

    public function MunToCompl(){
        return $this->hasMany(ComplainantModel::class, 'com_mun_id');
    }

    public function MunToInc(){
        return $this->hasMany(IncidentModel::class, 'mun_id');
    }
}
