@extends('layouts.mainLayout')
@section('title', 'Business Permit')
@section('content')
    
{{-- MAIN CONTENT --}}
<div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
    {{-- HEADER --}}
    <div class="row align-items-center justify-content-between mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
        <div class="col-6">
            <h4 class="text-dark">Business Permit</h4>
        </div>
        <div class="col-3">
            <a href="{{route('business-permits.create')}}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Apply Permit</a>
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

    <div class="content-main row">
        <div class="col-12">
            <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                <table class="table table-bordered text-center">
                    <thead style="background-color:rgb(47, 218, 132); color: black;">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact#</th>
                            <th>Bus. Structure</th>
                            <th>Applied</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($busData as $row)
                            
                            <tr>
                                <td>{{$row->b_lname}}, {{$row->b_fname}} {{$row->b_mname}}</td>
                                <td>{{$row->BusToMun->mun_name}}, {{$row->BusToBrgy->brgy_name}} - {{$row->BusToSubd->subd_name}}</td>
                                <td>{{$row->b_contactNum}}</td>
                                <td>{{$row->bus_structure}}</td>
                                <td>{{$row->created_at}}</td>
                                <td><a href="{{route('business-permits.show', $row->id)}}" class="btn btn-success w-100">view</a></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>
    </div>

@endsection