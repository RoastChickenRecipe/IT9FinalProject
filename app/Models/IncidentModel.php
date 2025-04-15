<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentModel extends Model
{
    protected $table = 'incidents';
    protected $fillable = [
        'complainant_id',
        'incident_type',
        'description',
        'date_reported',
        'status',
        'employee_id'
    ];

    public function IncToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function IncToCompl(){
        return $this->belongsTo(ComplainantModel::class, 'complainant_id');
    }

}
