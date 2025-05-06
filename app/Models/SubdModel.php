<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubdModel extends Model
{
    protected $table = 'subdivisions';
    protected $fillable = ['subd_name', 'barangay_id'];

    public function subdToBrgy(){
        return $this->belongsTo(BrgyModel::class, 'barangay_id');
    }

    public function SubdToHhold(){
        return $this->hasMany(HouseholdModel::class, 'barangay_id');
    }

    public function SubdToCompl(){
        return $this->hasMany(ComplainantModel::class, 'com_barangay_id');
    }
}
