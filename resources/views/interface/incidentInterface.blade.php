@extends('layouts.mainLayout')
@section('title', 'Complainants')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Complainants</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('complainants.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Report Incident</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #91cfb8; margin: 0;">

        {{-- TABLE --}}
        <div class="row">
            <div class="col-12">
                <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #91cfb8; color: black;">
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact #</th>
                                <th>Incident Reported</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->com_fname }} {{ $row->com_lname }}</td>
                                    <td>{{ $row->com_address }}</td>
                                    <td>{{ $row->com_contactNum }}</td>
                                    <td>{{ $row->ComplToInc->groupBy('id')->count() }}</td>
                                    <td>
                                        <a href="{{ route('complainants.show', $row->id) }}" class="btn btn-success btn-sm">Show</a>
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