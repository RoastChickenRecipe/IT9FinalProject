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
                            <th>Municipality</th>
                            <th>Region</th>
                            <th>Total Brgy</th>
                            <th>Total Subd</th>
                            <th>Population</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>



        </div>
    </div>

@endsection