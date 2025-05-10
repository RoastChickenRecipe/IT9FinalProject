<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusPermitModel extends Model
{
    protected $table = 'bus_permits';
    protected $fillable = [
        'b_fname',
        'b_mname',
        'b_lname',
        'b_contactNum',
        'b_age',
        'b_birthDate',

        'bus_structure',
        'dti_cda_cert',
        'bus_mayor_permit',
        'brgy_clearance',
        'comm_tax_cert',
        'k_of_lease',
        'zoning_clearance',

        'sanitary_permit',
        'fire_safety_permit',
        'bfad_permit',

        'mun_id',
        'brgy_id',
        'subd_id',

        'employee_id'
    ];

    public function BusToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function BusToMun(){
        return $this->belongsTo(MunModel::class, 'mun_id');
    }

    public function BusToBrgy(){
        return $this->belongsTo(BrgyModel::class, 'brgy_id');
    }

    public function BusToSubd(){
        return $this->belongsTo(SubdModel::class, 'subd_id');
    }
}
