@extends('layouts.secondaryLayout')

@section('sec-title', 'Edit | Bussiness Permit')
@section('sec-content')

    
    <h3>Edit Business Permit</h3>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row m-0 border">

            <div class="col col-12 my-2 text-center p-1"><h4>Basic Personal Info:</h4></div>

            <div class="col col-4 p-1">
                <label for="fname"><h5>First Name:</h5></label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div class="col col-4 p-1">
                <label for="mname"><h5>Middle Name:</h5></label>
                <input type="text" name="mname" class="form-control">
            </div>
            <div class="col col-4 p-1">
                <label for="lname"><h5>Last Name:</h5></label>
                <input type="text" name="lname" class="form-control">
            </div>


            <div class="col col-6 p-1">
                <label for="address"><h5>Address:</h5></label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="col col-2 p-1">
                <label for="contactNum"><h5>Contact #:</h5></label>
                <input type="text" name="contactNum" class="form-control">
            </div>
            <div class="col col-1 p-1">
                <label for="age"><h5>Age:</h5></label>
                <input type="text" name="age" class="form-control">
            </div>
            <div class="col col-3 p-1">
                <label for="bDate"><h5>Birth Date:</h5></label>
                <input type="date" name="bDate" class="form-control">
            </div>
            
        </div>

        <div class="row m-0 mt-4 border justify-content-center">

            <div class="col col-12 my-2 text-center p-1"><h4>Permits/Files/Certificates:</h4></div>

            <div class="col col-6 p-1">
                <label for="bStructure"><h5>Business Structure:</h5></label>
                <select name="bStructure" id="bStructure" class="form-select">
                    <option value="">------</option>
                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                    <option value="Corporation/Partnership">Corporation/Partnership</option>
                </select>
            </div>
            <div class="col col-6 p-1">
                <label for="dticdaCertFile"><h5>DTI/CDA Certificate:</h5></label>
                <input type="file" name="dticdaCertFile" class="form-control"> 
            </div>

            <div class="col col-6 p-1">
                <label for="busPermitFile"><h5>Business/Mayor's Permit:</h5></label>
                <input type="file" name="busPermitFile" class="form-control"> 
            </div>
            <div class="col col-6 p-1">
                <label for="brgyClearanceFile"><h5>Brgy. Clearance:</h5></label>
                <input type="file" name="brgyClearanceFile" class="form-control"> 
            </div>

            <div class="col col-6 p-1">
                <label for="ctcFile"><h5>Community Tax Certificate "Cedula":</h5></label>
                <input type="file" name="ctcFile" class="form-control"> 
            </div>
            <div class="col col-6 p-1">
                <label for="contOfLeaseFile"><h5>Contract of Lease/Title of Land:</h5></label>
                <input type="file" name="contOfLeaseFile" class="form-control"> 
            </div>

            <div class="col col-8 p-1">
                <label for="zoningClearanceFile"><h5>Zoning Clearance:</h5></label>
                <input type="file" name="zoningClearanceFile" class="form-control"> 
            </div>

        </div>

        <div class="row m-0 mt-4 border justify-content-center">

            <div class="col col-12 my-2 text-center"><h4>Other Permits:</h4></div>

            <div class="col col-6 p-1">
                <label for="sanitaryFile"><h5>Sanitary Permit:</h5></label>
                <input type="file" name="sanitaryFile" class="form-control"> 
            </div>
            <div class="col col-6 p-1">
                <label for="fireSafetyFile"><h5>Fire Safety Permit:</h5></label>
                <input type="file" name="fireSafetyFile" class="form-control"> 
            </div>

            <div class="col col-6 p-1">
                <label for="bfadFile"><h5>BFAD Permit:</h5></label>
                <input type="file" name="bfadFile" class="form-control"> 
            </div>

        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
            <div class="col col-6">
                <a href="{{route('business-permits.index')}}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>

    </form>



    
@endsection
