@extends('layouts.mainLayout')
@section('title', 'HouseHold')

@section('content')
<<<<<<< HEAD
=======
    
    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px;">
            <div class="osh-outline row align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3">
                    <h1 class="text-center">HouseHold</h1>
                </div>
>>>>>>> 42681888f42d79db47ad8a2cc83a6add7ddb4326

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">HouseHold</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('households.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Create Form</a>
            </div>
        </div>

<<<<<<< HEAD
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
                        <thead style="background-color: #91cfb8; color: black;">
                            <tr>
                                <th>Address</th>
                                <th>Fam. Count</th>
                                <th>HH. Type</th>
                                <th>Fam. Income</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->HholdToMun->mun_name }}, {{ $row->HholdToBrgy->brgy_name }} {{ $row->HholdToSubd->subd_name }}</td>
                                    <td>{{ $row->HholdToCit->groupBy('id')->count() }}</td>
                                    <td>{{ $row->household_type }}</td>
                                    <td>{{ $row->HholdToCit->sum('income') }}</td>
                                    <td>
                                        <a href="{{ route('households.show', $row->id) }}" class="btn btn-success btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
=======
    <div class="row mt-3 justify-content-center">
        <div class="osh-bg col col-11 justify-content-center p-1" style="height: 590px;">
            
            <div class="osh-outline row m-0 mt-2 text-center" style="height: 70px;">
                <div class="col col-5 pt-3" >
                    <h4>Address</h4>
                </div>
                <div class="col col-1">
                    <h4>Fam. Count</h4>
                </div>
                <div class="col col-2 pt-3">
                    <h4>HH. Type</h4>
                </div>
                <div class="col col-2 pt-3">
                    <h4>Fam. Income</h4>
                </div>
                <div class="col col-2 pt-3">
                    <h4>Action</h4>
>>>>>>> 42681888f42d79db47ad8a2cc83a6add7ddb4326
                </div>
            </div>

            <div class="row mt-1">
                <div class="col col-12 text-center" style="height: 470; overflow:auto;">

                    @foreach($data as $row)

                        <div class="osh-outline row m-0 mt-1" style="height: 75px;">
                            <div class="col col-5 pt-2">
                                <h4>{{$row->HholdToMun->mun_name}}, {{$row->HholdToBrgy->brgy_name}} {{$row->HholdToSubd->subd_name}}</h4>
                            </div>
                            <div class="col col-1 pt-2 align-self-center">
                                <h4>{{$row->HholdToCit->groupBy('id')->Count()}}</h4>
                        
                            </div>
                            <div class="col col-2 pt-2 align-self-center">
                                <h4>{{$row->household_type}}</h4>
                            </div>
                            <div class="col col-2 pt-2 align-self-center">
                                <h4>{{$row->HholdToCit->sum('income')}}</h4>
                            </div>
                            <div class="col col-2 align-self-center">
                                <a href="{{route('households.show', $row->id)}}" class="btn btn-success">VIEW</a>
                            </div>
                        </div>
                        
                    @endforeach
                    
                    

                </div>    
            </div>

        </div>
    </div>

@endsection