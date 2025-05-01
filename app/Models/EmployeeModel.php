<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'e_fname',
        'e_lname',
        'position',
        'e_address',
        'e_contact_number',
        'e_username',
        'e_password'
    ];

    public function EmpToHhold(){
        return $this->hasMany(HouseholdModel::class, 'employee_id');
    }

    public function EmpToRqDoc(){
        return $this->hasMany(rqDocumentModel::class, 'employee_id');
    }

    public function EmpToInc(){
        return $this->hasMany(IncidentModel::class, 'employee_id');
    } 

    public function EmpToBus(){
        return $this->hasMany(BusPermitModel::class, 'employee_id');
    } 

}
