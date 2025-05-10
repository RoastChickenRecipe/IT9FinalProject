@extends('layouts.mainLayout')
@section('title', 'Incidents')

@section('content')

{{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Incidents</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('rqDocuments.create') }}" class="btn w-100" style="background-color:rgb(1, 110, 34); color: white; border-radius: 10px;">Log Incident</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12" style="overflow: auto;">
                <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #91cfb8; color: black;">
                            <tr>
                                <th>Incident Type</th>
                                <th>Address</th>
                                <th>Issued By</th>
                                <th>Incident Reported</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->incident_type}}</td>
                                    <td>{{$row->inc_address}}</td>
                                    <td>{{$row->IncToEmp->e_fname}} {{$row->IncToEmp->e_fname}}</td>
                                    <td>{{$row->date_reported}}</td>
                                    <td>
                                        <a href="{{route('incidents.show', $row->id)}}" class="btn btn-success btn-sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection