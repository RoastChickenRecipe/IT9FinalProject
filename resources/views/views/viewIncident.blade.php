@extends('layouts.viewLayout')
@section('view-title', 'View | Incident')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">

                <div class="col col-12">

                    <a href="{{route('complainants.edit', $compl->id)}}" class="btn btn-dark w-100"><h5>Edit Complainant</h5></a>
                    
                </div>
                <div class="col col-12 mt-4">
                    {{--
                    <form action="{{route('incidents.create')}}" method="POST" class="m-0">
                        @csrf
                        <input type="text" name="id" hidden value="{{$compl->id}}">
                        <button type="submit" class="btn btn-dark w-100"><h5>File Incident</h5></button>
                    </form>--}}
                    <a href="{{route('incidents.show', $compl->id)}}" class="btn btn-dark w-100"><h5>File Incident</h5></a>
                </div>

                <div class="col col-12 mt-4">
                    <form action="{{route('complainants.export')}}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100"><h5>Export</h5></button>
                    </form>
                </div>

                <div class="col col-12 mt-4">
                    <form action="{{route('incidents.destroyAll', $compl->id)}}" method="POST" class="m-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100"><h5>Delete All</h5></button>
                    </form>
                </div>

            </div>

            <div class="osh-outline row m-0 mt-5 align-items-center text-center">
                <div class="col col-12">
                    <a href="{{route('complainants.index')}}" class="btn btn-dark w-100"><h5>Go back</h5></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('view-content')
    
    {{-- Main Content --}}
    <div class="osh-bg">

        <div class="row justify-content-center m-0 mb-2">
            <div class="osh-outline col col-5 text-center">
                <h3>Complainant</h3> 
            </div>
        </div>
        <h4 class="osh-outline">Name: {{$compl->com_fname}} {{$compl->com_lname}}</h4>
        <h4 class="osh-outline">Contact #: {{$compl->com_contactNum}}</h4>
        <h4 class="osh-outline">Address: {{$compl->com_address}}</h4>

        @session('message')
            <div class="bg-info rounded-3 mt-2 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
        @endsession

    </div>

    <div class="osh-bg mt-4">

        <div class="row justify-content-center m-0">
            <div class="osh-outline col col-5 text-center">
                <h3>Incidents</h3> 
            </div>
        </div>

        @foreach($incData as $row)
            <div class="osh-outline row m-0 mt-5">
                <div class="col col-4 text-center">
                    <h4>Incident Type:</h4>
                    <h3 style="border-bottom: solid 2px black;">{{$row->incident_type}}</h3>
                </div>
                <div class="col col-4 text-center">
                    <h4>Date Reported:</h4>
                    <h3 style="border-bottom: solid 2px black;">{{$row->date_reported}}</h3>
                </div>
                <div class="col col-4 text-center">
                    <h4>Issued By:</h4>
                    <h3 style="border-bottom: solid 2px black;">{{$row->IncToEmp->e_fname}} {{$row->IncToEmp->e_lname}}</h3>
                </div>
                <div class="col col-12">
                    <h4>Description:</h4>
                    <h3 style="border-bottom: solid 2px black;">{{$row->description}}</h3>
                </div>

                <div class="col col-6">
                    <a href="{{route('incidents.edit', $row->id)}}" class="btn btn-dark w-100"><h5>Edit</h5></a>
                </div>
                <div class="col col-6">
                    <form action="{{route('incidents.destroy', $row->id)}}" method="post" class="m-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100"><h5>Delete</h5></button>
                    </form>
                </div>
            </div>
        @endforeach
        

    </div>


@endsection