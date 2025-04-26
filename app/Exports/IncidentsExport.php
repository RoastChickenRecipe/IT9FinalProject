<?php

namespace App\Exports;

use App\Models\IncidentModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncidentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        /*
        return IncidentModel::select(
            'complainant_id',
            'incident_type',
            'description',
            'date_reported',
            'employee_id'
        )
        ->get();
        */
        return DB::table('incidents')
            ->join('complainants', 'incidents.complainant_id', '=', 'complainants.id')
            ->join('employees', 'incidents.employee_id', '=', 'employees.id')
            ->select('complainants.com_fname',
                    'complainants.com_lname',
                    'complainants.com_contactNum',
                    'complainants.com_address',
                    'incidents.incident_type',
                    'incidents.description',
                    'incidents.date_reported',
                    'employees.e_fname')
            ->get();
    }

    public function headings() : array
    {
        return [
            'First Name',
            'Last Name',
            'Contact Number',
            'Address',
            'Incident Type',
            'description',
            'Date Reported',
            'Employee First Name'
        ];
    }
}
