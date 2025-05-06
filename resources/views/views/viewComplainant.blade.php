@extends('layouts.viewLayout')
@section('view-title', 'View | Complainants')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">

                <div class="col col-12 p-0">

                    <a href="{{route('complainants.edit', $compl->id)}}" class="btn btn-dark w-100"><h5>Edit Complaint</h5></a>
                    
                </div>

                <div class="col col-12 mt-5 p-0">
                    <form action="{{route('complainants.destroy', $compl->id)}}" method="post" class="m-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100"><h5>Delete</h5></button>
                    </form>
                    
                </div>

                

            </div>

            @session('message')
                <div class="osh-outline mt-3">
                    <div class="bg-info rounded-3 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
                </div>
            @endsession

            <div class="osh-outline row m-0 mt-5 align-items-center text-center">
                <div class="col col-12 p-0">
                    <a href="{{route('complainants.index')}}" class="btn btn-dark w-100"><h5>Go back</h5></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('view-content')
    
    {{-- Main Content --}}
    <div class="osh-bg">

        <form action="{{route('complainants.export')}}" method="post" class="m-0">
            @csrf
             
            <div class="row justify-content-center m-0 mb-2">
                <div class="osh-outline col col-5 text-center">
                    <h3>Complaint</h3>
                    <input type="text" name="complId" value="{{$compl->id}}" class="form-control">
                </div>
            </div>

            <div class="row m-0">

                <div class="col col-6 p-0">
                    <div class="osh-outline me-1">
                        <h4>First Name:</h4>
                        <input type="text" readonly name="com_fname" value="{{$compl->com_fname}}" class="form-control">
                    </div>
                </div>
                <div class="col col-6 p-0">
                    <div class="osh-outline ms-1">
                        <h4>Last Name:</h4>
                        <input type="text" readonly name="com_lname" value="{{$compl->com_lname}}" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row m-0 mt-2">

                <div class="col col-6 p-0">
                    <div class="osh-outline me-1">
                        <h4>Contact #:</h4>
                        <input type="text" readonly name="com_contact" value="{{$compl->com_contactNum}}" class="form-control">
                    </div>
                </div>
                <div class="col col-6 p-0">
                    <div class="osh-outline ms-1">
                        <h4>Address:</h4>
                        <input type="text" readonly name="com_address" value="{{$compl->ComplToMun->mun_name}}, {{$compl->ComplToBrgy->brgy_name}} - {{$compl->ComplToSubd->subd_name}}" class="form-control">
                        <input type="text" name="brgy" value="{{$compl->ComplToBrgy->brgy_name}}" hidden>
                    </div>
                </div>

            </div>

            <div class="row m-0 mt-2">

                <div class="col col-6 p-0">
                    <div class="osh-outline me-1">
                        <h4>Defendant Name:</h4>
                        <input type="text" readonly name="def_name" value="{{$compl->def_name}}" class="form-control">
                    </div>
                </div>
                <div class="col col-6 p-0">
                    <div class="osh-outline ms-1">
                        <h4>Defendant Contact #:</h4>
                        <input type="text" readonly name="def_contact" value="{{$compl->def_conNum ? $compl->def_conNum : 'None'}}" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row m-0 mt-2">

                <div class="col col-5 p-0">
                    <div class="osh-outline me-1">
                        <h4>Defendant Address:</h4>
                        <input type="text" readonly name="def_address" value="{{$compl->def_address ? $compl->def_address : 'None'}}" class="form-control">
                    </div>
                </div>
                <div class="col col-3 p-0">
                    <div class="osh-outline mx-1">
                        <h4>Date Reported:</h4>
                        <input type="text" readonly name="date_rep" value="{{$compl->date_reported}}" class="form-control">
                    </div>
                </div>
                <div class="col col-4 p-0">
                    <div class="osh-outline ms-1">
                        <h4>Barangay:</h4>
                        <input type="text" readonly name="brgy" value="{{$compl->ComplToBrgy->brgy_name}}" class="form-control">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-dark w-100 mt-4"><h5>Export</h5></button>

        </form>

    </div>


@endsection