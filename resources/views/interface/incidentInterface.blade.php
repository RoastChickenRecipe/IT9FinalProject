@extends('layouts.mainLayout')
@section('title', 'Complainants')

@section('content')

<<<<<<< HEAD
    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Complainants</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('complainants.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Report Incident</a>
            </div>
        </div>
=======
    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="osh-outline col col-11" style="height: 70px;">

            <div class="row align-items-center justify-content-between" style="height: 70px">
                <div class=" col col-3 ">
                    <h1>Complainants</h1>
                </div>
>>>>>>> 42681888f42d79db47ad8a2cc83a6add7ddb4326

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

<<<<<<< HEAD
=======
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
    
>>>>>>> 42681888f42d79db47ad8a2cc83a6add7ddb4326
@endsection