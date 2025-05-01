@extends('layouts.viewLayout')
@section('view-title', 'View | Incident')
@section('floating')

    {{-- Floating Box --}}
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline row m-0 align-items-center text-center">
                <div class="col col-12">
                    <form action="{{route('business-permits.destroy', $busData->id)}}" method="post" class="m-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100"><h5>Delete</h5></button>
                    </form>
                </div>
            </div>

            <div class="osh-outline row m-0 mt-5 align-items-center text-center">
                <div class="col col-12">
                    <a href="{{route('business-permits.index')}}" class="btn btn-dark w-100"><h5>Go back</h5></a>
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

            <div class="col col-6 p-0 pe-1">
                <h4 class="osh-outline">Contact #: {{$busData->b_contactNum}}</h4>
            </div>
            <div class="col col-6 p-0 ps-1">
                <h4 class="osh-outline">Address: {{$busData->b_address}}</h4>
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
        

        @session('message')
            <div class="bg-info rounded-3 mt-2 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
        @endsession

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
                    <a href="/uploadFiles/files/{{$busData->dti_cda_cert}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Business/Mayor's Permit:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->bus_mayor_permit}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->bus_mayor_permit}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Brgy. Clearance:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->brgy_clearance}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->brgy_clearance}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Community Tax Certificate "Cedula":</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->comm_tax_cert}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->comm_tax_cert}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Contract of Lease/Title of Land:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->k_of_lease}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->k_of_lease}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>


            <div class="osh-outline col col-10 mt-2">
                <h4>Zoning Clearance:</h4>
                <h5 style="border-bottom: 3px solid black;">{{$busData->zoning_clearance}}</h5>
            </div>
            <div class="col col-2 p-0 ps-1 align-self-center">
                <div class="osh-outline">
                    <a href="/uploadFiles/files/{{$busData->zoning_clearance}}" target="_blank" class="btn btn-info w-100"><h5>Download</h5></a>
                </div>
            </div>
            
        </div>

    </div>

    


@endsection