@extends('interface.mainLayout')
@section('title', 'Incidents')
@section('content')

    {{-- HEADER --}}
    <div class="row border mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">
            <div class="row border align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3 border ">
                    <h1 class="text-center" style="color: white">Incidents</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('incidents.create')}}" class="btn btn-dark w-100">Report Incident</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col col-11 border justify-content-center" style="height: 590px; background-color:hsl(90, 2%, 52%); border-radius:10px;">
            
            <div class="row mx-1 border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                <div class="col col-3">
                    <h4>Name</h4>
                </div>
                <div class="col col-2">
                    <h4>Incident</h4>
                </div>
                <div class="col col-3">
                    <h4>Description</h4>
                </div>
                <div class="col col-2">
                    <h4>Date</h4>
                </div>
                <div class="col col-2">
                    <h4>Action</h4>
                </div>
            </div>

            @foreach($data as $row)

                <div class="row mx-1 border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                    <div class="col col-3">
                        <h5>{{$row->complainant_name}}</h5>
                    </div>
                    <div class="col col-2">
                        <h5>{{$row->incident_type}}</h5>
                    </div>
                    <div class="col col-3">
                        <h5>{{$row->description}}</h5>
                    </div>
                    <div class="col col-2">
                        <h5>{{$row->date_reported}}</h5>
                    </div>

                    <div class="col col-1">
                        <a href="{{route('incidents.edit', $row->id)}}" class="btn btn-success w-100">E</a>
                    </div>
                    <div class="col col-1">
                        <form action="" method="post" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">D</button>
                        </form>
                    </div>
                   
                </div>
                
            @endforeach


        </div>
    </div>
    
@endsection