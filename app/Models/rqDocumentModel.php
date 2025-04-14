<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rqDocumentModel extends Model
{
    protected $table = 'rq_documents';
    protected $fillable = [
        'document_type',
        'issue_date',
        'citizen_id',
        'employee_id'
    ];

    public function RqDocToEmp(){
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function RqDocToCit(){
        return $this->belongsTo(CitizenModel::class, 'citizen_id');
    }
}
