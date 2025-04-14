<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitizenModel extends Model
{
    protected $table = 'citizens';
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'suffix',

        'sex',
        'age',
        'family_role',
        'birth_date',
        'place_of_birth',
        'blood_type',
        'religion',

        'contactNum',
        'years_of_residency',
        'educational_attainment',
        'citizen_status',
        'employment_status',
        'income',

        'household_id'
    ];

    public function CitToHhold(){
        return $this->belongsTo(HouseholdModel::class, 'household_id');
    }

    public function CitToRqDoc(){
        return $this->hasMany(rqDocumentModel::class, 'citizen_id');
    }
}
