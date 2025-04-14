<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseholdModel extends Model
{
    protected $table = 'households';
    protected $fillable = [
        'household_type',
        'municipality_id',
        'barangay_id',
        'subdivision_id',
        'employee_id'
    ];

    public function HholdToMun(){
        return $this->belongsTo(MunModel::class, 'municipality_id');
    }

    public function HholdToBrgy(){
        return $this->belongsTo(BrgyModel::class, 'barangay_id');
    }

    public function HholdToSubd(){
        return $this->belongsTo(SubdModel::class, 'subdivision_id');
    }

    public function HholdToCit(){
        return $this->hasMany(CitizenModel::class, 'household_id');
    }

    public function HholdToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}
