@extends('layouts.mainLayout')
@section('title', 'Complainants')
@section('content')

    {{-- HEADER --}}
    <div class="row border mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">
            <div class="row border align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3 border ">
                    <h1 class="text-center" style="color: white">Complainants</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('complainants.create')}}" class="btn btn-dark w-100">Report Incident</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col col-11 border justify-content-center" style="height: 590px; background-color:hsl(90, 2%, 52%); border-radius:10px;">
            
            <div class="row mx-1 border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                <div class="col col-4 align-self-center">
                    <h4>Name</h4>
                </div>
                <div class="col col-2 align-self-center">
                    <h4>Address</h4>
                </div>
                <div class="col col-2 align-self-center">
                    <h4>Contact #</h4>
                </div>
                <div class="col col-2 align-self-center">
                    <h4>Incident Reported:</h4>
                </div>
                <div class="col col-2 align-self-center">
                    <h4>Action</h4>
                </div>
            </div>

            @foreach($data as $row)

                <div class="row mx-1 border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                    <div class="col col-4">
                        <h5>{{$row->com_fname}} {{$row->com_fname}}</h5>
                    </div>
                    <div class="col col-2 align-self-center">
                        <h5>{{$row->com_address}}</h5>
                    </div>
                    <div class="col col-2 align-self-center">
                        <h5>{{$row->com_contactNum}}</h5>
                    </div>
                    <div class="col col-2 align-self-center">
                        <h5>{{$row->ComplToInc->groupBy('id')->count()}}</h5>
                    </div>
                    <div class="col col-2 align-self-center">
                        <a href="{{route('complainants.show', $row->id)}}" class="btn btn-success">Show</a>
                    </div>
                   
                </div>
                
            @endforeach


        </div>
    </div>
    
@endsection