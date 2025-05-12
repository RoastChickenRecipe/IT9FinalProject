<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplainantModel extends Model
{
    protected $table = 'complainants';
    protected $fillable = [
        'com_fname',
        'com_lname',
        'com_contactNum',
        'def_name',
        'def_conNum',
        'def_address',
        'date_reported',
        'com_mun_id',
        'com_brgy_id',
        'com_subd_id',
        'employee_id'
    ];

    public function ComplToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function ComplToMun(){
        return $this->belongsTo(MunModel::class, 'com_mun_id');
    }

    public function ComplToBrgy(){
        return $this->belongsTo(BrgyModel::class, 'com_brgy_id');
    }

    public function ComplToSubd(){
        return $this->belongsTo(SubdModel::class, 'com_subd_id');
    }
}
