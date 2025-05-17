@extends('layouts.viewLayout')
@section('view-title', 'View | Complainants')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">

                <div class="col col-12 p-0">

                    <a href="{{route('complainants.edit', $compl->id)}}" class="btn w-100 osh-btn-add"><h5>Edit Complaint</h5></a>
                    
                </div>

                <div class="col col-12 p-0 mt-3">
                    <form action="{{route('complainants.export')}}" method="post" class="m-0">
                        @csrf

                        <button type="submit" class="btn w-100 osh-btn-add"><h5>Export</h5></button>
                        <input type="text" name="complId" value="{{$compl->id}}" hidden>

                    </form>
                </div>

                <div class="col col-12 mt-5 p-0">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                    <a href="{{route('complainants.index')}}" class="btn w-100 osh-btn-add"><h5>Go back</h5></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('view-content')
    
    {{-- Main Content --}}
    <div class="osh-bg mb-3 p-2">

        <div class="row m-0">
            <div class="col col-4 text-center p-0 pe-1">
                <div class="osh-outline">
                    <h4>Issued by:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->ComplToEmp->e_fname}} {{$compl->ComplToEmp->e_lname}}</h3>
                </div>
            </div>
            <div class="col col-4 text-center p-0 px-1">
                <div class="osh-outline">
                    <h4>Barangay:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->ComplToBrgy->brgy_name}}</h3>
                </div>
            </div>
            <div class="col col-4 text-center p-0 ps-1">
                <div class="osh-outline">
                    <h4>Date Reported:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->date_reported}}</h3>
                </div>
            </div>
        </div>


    </div>
    <div class="osh-bg">
             
        <div class="row justify-content-center m-0 mb-2">
            <div class="osh-outline col col-5 text-center">
                <h3>Complaint</h3>
            </div>
        </div>

        <div class="row m-0">

            <div class="col col-6 p-0">
                <div class="osh-outline me-1">
                    <h4>First Name:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->com_fname}}</h3>
                </div>
            </div>
            <div class="col col-6 p-0">
                <div class="osh-outline ms-1">
                    <h4>Last Name:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->com_lname}}</h3>
                </div>
            </div>

        </div>

        <div class="row m-0 mt-2">

            <div class="col col-6 p-0 align-self-center">
                <div class="osh-outline me-1">
                    <h4>Contact #:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->com_contactNum}}</h3>
                </div>
            </div>
            <div class="col col-6 p-0">
                <div class="osh-outline ms-1">
                    <h4>Address:</h4>
                    <h3>{{$compl->ComplToMun->mun_name}},</h3>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->ComplToBrgy->brgy_name}} - {{$compl->ComplToSubd->subd_name}}</h3>
                </div>
            </div>

        </div>

        <div class="row m-0 mt-2">

            <div class="col col-6 p-0">
                <div class="osh-outline me-1">
                    <h4>Defendant Name:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->def_name}}</h3>
                </div>
            </div>
            <div class="col col-6 p-0">
                <div class="osh-outline ms-1">
                    <h4>Defendant Contact #:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->def_conNum ? $compl->def_conNum : 'None'}}</h3>
                </div>
            </div>

        </div>

        <div class="row m-0 mt-2">

            <div class="col col-12 p-0">
                <div class="osh-outline me-1">
                    <h4>Defendant Address:</h4>
                    <h3 style="border-bottom: solid 2px black ;">{{$compl->def_address ? $compl->def_address : 'None'}}</h3>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel"><strong>DELETE | {{$compl->com_fname}} {{$compl->com_lname}}</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('complainants.destroy', $compl->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h4>Are you sure you want to <strong>DELETE {{$compl->com_fname}} {{$compl->com_lname}}</strong> complaint?</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn text-white w-100" style="background-color: #DC3545;"><h5>Delete</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>   
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Delete Modal -->


@endsection