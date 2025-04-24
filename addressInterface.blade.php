@extends('layouts.mainLayout')
@section('title', 'Address')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Address</h4>
            </div>
            <div class="col-2">
                <a href="{{ route('municipality.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Add Mun</a>
            </div>
            <div class="col-2">
                <a href="{{ route('barangay.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Add Brgy</a>
            </div>
            <div class="col-2">
                <a href="{{ route('subdivision.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Add Subd</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #91cfb8; margin: 0;">

        {{-- SEARCH BAR --}}
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" class="form-control" placeholder="Search" style="border-radius: 0; border: none;">
                    <button class="btn" style="background-color: #b3e6cc; color: black; border: none;">X</button>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="row">
            <div class="col-12">
                <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color:rgb(47, 218, 132); color: black;">
                            <tr>
                                <th>Municipality</th>
                                <th>Region</th>
                                <th>Total Brgy</th>
                                <th>Total Subd</th>
                                <th>Population</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->mun_name }}</td>
                                    <td>{{ $row->region }}</td>
                                    <td>{{ $row->MunToBrgy->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToHhold->flatMap->HholdToCit->groupBy('id')->count() }}</td>
                                    <td>
                                        <a href="{{ route('municipality.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
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
