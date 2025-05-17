@extends('layouts.viewLayout')
@section('view-title', 'View | Incident')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">

                <div class="col col-12 p-0">
                    <a href="{{route('business-permits.edit', $busData->id)}}" class="btn osh-btn-add w-100"><h5>Edit</h5></a>
                </div>

                <div class="col col-12 p-0 mt-3">
                    <form action="{{route('business-permits.export')}}" method="post" class="m-0">
                        @csrf
                        <input type="text" name="busPermitId" value="{{$busData->id}}" hidden>
                        <button type="submit" class="btn osh-btn-add w-100"><h5>Export</h5></button>
                    </form>
                </div>

                <div class="col col-12 p-0 mt-5">
                    
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
                    <a href="{{route('business-permits.index')}}" class="btn osh-btn-add w-100"><h5>Go back</h5></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('view-content')
    
    {{-- Main Content --}}
    <div class="osh-bg">

        <div class="row m-0">

            <div class="col col-12 p-0">
                <h4 class="osh-outline">Name: {{$busData->b_fname}} {{$busData->b_mname}} {{$busData->b_lname}}</h4>
            </div>

            <div class="col col-4 p-0 pe-1 align-self-center">
                <h4 class="osh-outline">Contact #: {{$busData->b_contactNum}}</h4>
            </div>
            <div class="col col-8 p-0 ps-1">
                <h4 class="osh-outline">Address: {{$busData->BusToMun->mun_name}}, {{$busData->BusToBrgy->brgy_name}} - {{$busData->BusToSubd->subd_name}}</h4>
            </div>

            <div class="col col-2 p-0 pe-1">
                <h4 class="osh-outline">Age: {{$busData->b_age}}</h4>
            </div>
            <div class="col col-4 p-0 px-1">
                <h4 class="osh-outline">Birth Date: {{$busData->b_birthDate}}</h4>
            </div>
            <div class="col col-6 p-0 ps-1">
                <h4 class="osh-outline">Bus. Structure: {{$busData->bus_structure}}</h4>
            </div>

        </div>
        
    </div>

    <div class="osh-bg mt-5">

        <div class="row m-0">

            <div class="col col-10 p-0 pe-1">
                <div class="osh-outline">
                    <h4>DTI/CDA Certificate:</h4>
                    <h5 style="border-bottom: 3px solid black;">{{$busData->dti_cda_cert}}</h5>
                </div>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->dti_cda_cert}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Business/Mayor's Permit:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->bus_mayor_permit}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->bus_mayor_permit}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Brgy. Clearance:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->brgy_clearance}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->brgy_clearance}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Community Tax Certificate "Cedula":</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->comm_tax_cert}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->comm_tax_cert}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Contract of Lease/Title of Land:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->k_of_lease}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->k_of_lease}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Zoning Clearance:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->zoning_clearance}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->zoning_clearance}}" target="_blank" class="btn btn-outline-info w-100 text-dark"><h5>Download</h5></a>
                </div>
            </div>
            
        </div>

    </div>

    <div class="osh-bg mt-5">

        <div class="row m-0">

            <div class="col col-10 p-0 pe-1">
                <div class="osh-outline">
                    <h4>Sanitary Permit:</h4>
                    <h5 style="border-bottom: 3px solid black;">{{$busData->sanitary_permit == '' ? 'None' : $busData->sanitary_permit}}</h5>
                </div>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <button class="btn btn-outline-info w-100" {{$busData->sanitary_permit == '' ? 'disabled' : ''}}><a href="/uploadFiles/files/{{$busData->sanitary_permit}}" target="_blank" style="text-decoration: none; color:black;"><h5>Download</h5></a></button>

                </div>
            </div>

            <div class="osh-outline col col-10 mt-2">
                <h4>Fire Safety Permit:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->fire_safety_permit == '' ? 'None' : $busData->fire_safety_permit}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <button class="btn btn-outline-info w-100" {{$busData->fire_safety_permit == '' ? 'disabled' : ''}}><a href="/uploadFiles/files/{{$busData->fire_safety_permit}}" target="_blank" style="text-decoration: none; color:black;"><h5>Download</h5></a></button>

                </div>
            </div>

            <div class="osh-outline col col-10 mt-2">
                <h4>BFAD Permit:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->bfad_permit == '' ? 'None' : $busData->bfad_permit}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <button class="btn btn-outline-info w-100" {{$busData->bfad_permit == '' ? 'disabled' : ''}}><a href="/uploadFiles/files/{{$busData->bfad_permit}}" target="_blank" style="text-decoration: none; color:black;"><h5>Download</h5></a></button>
                </div>
            </div>

        </div>

    </div>
    
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel"><strong>DELETE | {{$busData->b_fname}} {{$busData->b_mname}} {{$busData->b_lname}}</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('business-permits.destroy', $busData->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h4>Are you sure you want to <strong>DELETE {{$busData->b_fname}} {{$busData->b_mname}} {{$busData->b_lname}}</strong> business permit?</h4>
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