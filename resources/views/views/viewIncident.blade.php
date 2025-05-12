@extends('layouts.viewLayout')
@section('view-title', 'View | Incident')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">

                <div class="col col-12 p-0">

                    <a href="{{route('incidents.edit', $data->id)}}" class="btn btn-dark w-100"><h5>Edit Incident</h5></a>
                    
                </div>

                <div class="col col-12 mt-4 p-0">
                    <form action="{{route('incidents.export')}}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100"><h5>Export</h5></button>
                        <input type="text" name="incId" value="{{$data->id}}" hidden>
                    </form>
                </div>

                <div class="col col-12 mt-4 p-0">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn w-100 text-white" data-bs-toggle="modal" data-bs-target="#deleteModal" style="background-color: #DC3545;">
                    <h5>Delete</h5>
                    </button>
                </div>

            </div>

            @session('message')
                <div class="osh-outline mt-3">
                    <div class="bg-info rounded-3 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
                </div>
            @endsession

            <div class="osh-outline row m-0 mt-5 align-items-center text-center">
                <div class="col col-12 p-0">
                    <a href="{{route('incidents.index')}}" class="btn btn-dark w-100"><h5>Go back</h5></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('view-content')
    
    {{-- Main Content --}}

    <div class="osh-bg">

        <div class="row justify-content-center m-0">
            <div class="osh-outline col col-5 text-center">
                <h3>Incidents</h3> 
            </div>
        </div>

        
        <div class="osh-outline row m-0 mt-5">
            <div class="col col-4 text-center">
                <h4>Incident Type:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->incident_type}}</h3>
            </div>
            <div class="col col-4 text-center align-self-end">
                <h4>Date Reported:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->date_reported}}</h3>
            </div>
            <div class="col col-4 text-center align-self-end">
                <h4>Issued By:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->IncToEmp->e_fname}} {{$data->IncToEmp->e_lname}}</h3>
            </div>
            

        </div>

        <div class="osh-outline row m-0 mt-3">
            <div class="col col-12">
                <h4>Exact Location of Incident:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->inc_address}}</h3>
            </div>
        </div>

        <div class="osh-outline row m-0 mt-3">
            <div class="col col-12">
                <h4>Inclusive Dates and Time of Incident:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->dates_time}}</h3>
            </div>
        </div>

        <div class="osh-outline row m-0 mt-3">
            <div class="col col-12">
                <h4>Description:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->description}}</h3>
            </div>
        </div>

        <div class="osh-outline row m-0 mt-3">
            <div class="col col-12">
                <h4>Involved Person/Specific Identification:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->involved}}</h3>
            </div>
        </div>

        <div class="osh-outline row m-0 mt-3">
            <div class="col col-12">
                <h4>Action Taken:</h4>
                <h3 style="border-bottom: solid 2px black;">{{$data->action_taken}}</h3>
            </div>
        </div>  

    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel"><strong>DELETE</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('incidents.destroy', $data->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h4>Are you sure you want to <strong>DELETE</strong> this incident?</h4>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn text-white" style="background-color: #DC3545;"><h5>Delete</h5></button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><h5>Close</h5></button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Delete Modal -->


@endsection