<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentModel extends Model
{
    protected $table = 'incidents';
    protected $fillable = [
        'incident_type',
        'description',
        'inc_address',
        'dates_time',
        'involved',
        'action_taken',
        'date_reported',
        'mun_id',
        'brgy_id',
        'employee_id'
    ];

    public function IncToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function IncToMun(){
        return $this->belongsTo(MunModel::class, 'mun_id');
    }

    public function IncToBrgy(){
        return $this->belongsTo(BrgyModel::class, 'brgy_id');
    }

    public function IncToSubd(){
        return $this->belongsTo(SubdModel::class, 'subd_id');
    }

}
