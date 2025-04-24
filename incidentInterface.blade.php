@extends('layouts.mainLayout')
@section('title', 'Complainants')
@section('content')

    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="osh-outline col col-11" style="height: 70px;">

            <div class="row align-items-center justify-content-between" style="height: 70px">
                <div class=" col col-3 ">
                    <h1>Complainants</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('complainants.create')}}" class="btn btn-dark w-100">Report Incident</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="osh-bg col col-11 justify-content-center p-1" style="height: 590px;">
            
            <div class="osh-outline row m-0 mt-2 text-center">
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

                <div class="osh-outline row m-0 text-center mt-2">
                    <div class="col col-4 align-self-center">
                        <h5>{{$row->com_fname}} {{$row->com_lname}}</h5>
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
                    <div class="col col-1 align-self-center">
                        <a href="{{route('complainants.show', $row->id)}}" class="btn btn-success w-100">View</a>
                    </div>
                    <div class="col col-1 align-self-center">
                        <form action="{{route('complainants.destroy', $row->id)}}" method="post" class="m-0">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                        </form>
                    </div>
                   
                </div>
                
            @endforeach


        </div>
    </div>
    
@endsection