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
        'com_address'
    ];

    public function ComplToInc(){
        return $this->hasMany(IncidentModel::class, 'complainant_id');
    }
}
