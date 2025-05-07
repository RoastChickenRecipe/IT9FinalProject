<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrgyModel extends Model
{
    protected $table = 'barangays';
    protected $fillable = ['brgy_name', 'municipality_id'];

    public function BrgyToMun(){
        return $this->belongsTo(MunModel::class, 'municipality_id');
    }

    public function BrgyToSubd(){
        return $this->hasMany(SubdModel::class, 'barangay_id');
    }

    public function BrgyToHhold(){
        return $this->hasMany(HouseholdModel::class, 'barangay_id');
    }

    public function BrgyToCompl(){
        return $this->hasMany(ComplainantModel::class, 'com_barangay_id');
    }

    public function BrgyToInc(){
        return $this->hasMany(IncidentModel::class, 'brgy_id');
    }
}
