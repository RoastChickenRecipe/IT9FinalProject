@extends('layouts.secondaryLayout')

@section('sec-title', 'Form | Bussiness Permit')
@section('sec-content')

    
    <h3 class="osh-bg text-center">Apply For Business Permit</h3>

    <form action="{{route('business-permits.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="osh-bg row m-0 mt-3 border">

            <div class="col col-6 p-1">
                <label for="set_mun"><h5>Municipality:</h5></label>
                <input type="text" id="set_mun" class="form-control" readonly disabled>
            </div>

            <div class="col col-6 p-1">
                <label for="set_emp"><h5>Employee:</h5></label>
                <input type="text" id="set_emp" class="form-control" value="{{$emp->e_fname}} {{$emp->e_lname}}" readonly disabled>
                <input type="text" name="empId" value="{{$emp->id}}" hidden>
            </div>

        </div>

        <div class="osh-bg row m-0 mt-3">

            <div class="col col-12 my-2 text-center p-1"><h4 class="osh-outline text-center">Basic Personal Info:</h4></div>

            <div class="col col-4 p-1">
                <label for="fname"><h5>First Name:</h5></label>
                <input type="text" name="fname" class="form-control" value="{{old('fname')}}">
                @error('fname')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-4 p-1">
                <label for="mname"><h5>Middle Name:</h5></label>
                <input type="text" name="mname" class="form-control" value="{{old('mname')}}">
                @error('mname')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-4 p-1">
                <label for="lname"><h5>Last Name:</h5></label>
                <input type="text" name="lname" class="form-control" value="{{old('lname')}}">
                @error('lname')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>


            <div class="col col-6 p-1">
                <label for="address"><h5>Address:</h5></label>
                <select name="address" id="address" class="form-select"  onchange="getId()">
                    <option value="">None</option>
                    @foreach($address as $row)
                        <option value="{{$row->mun_id}},{{$row->brgy_id}}:{{$row->subd_id}}">{{$row->mun_name}}, {{$row->brgy_name}} - {{$row->subd_name}}</option>
                    @endforeach

                </select>
                
                <input type="text" name="mun_id" id="mun_id" class="form-control" hidden>
                <input type="text" name="brgy_id" id="brgy_id" class="form-control" hidden>
                <input type="text" name="subd_id" id="subd_id" class="form-control" hidden>
                @error('mun_id')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
                <script>

                    function getId(){
                        var check = document.getElementById('address').value;
                        var selected = document.getElementById('address');
                    
                        if(check){
                            var data = selected.options[selected.selectedIndex].value;
                            var text = selected.options[selected.selectedIndex].text;
                            let formun = data.slice(0, data.indexOf(","));
                            let forbrgy = data.slice(data.indexOf(",") + 1, data.indexOf(":"));
                            let forsubd = data.slice(data.indexOf(":") + 1);
                            let get_mun = text.slice(0, text.indexOf(','));

                            document.getElementById('mun_id').value = formun;
                            document.getElementById("brgy_id").value = forbrgy;
                            document.getElementById("subd_id").value = forsubd;
                            document.getElementById("set_mun").setAttribute('value', get_mun);

                        }else{
                            document.getElementById('mun_id').value = '';
                            document.getElementById("brgy_id").value = '';
                            document.getElementById("subd_id").value = '';
                            document.getElementById("set_mun").setAttribute('value', '');

                        }

                    }

                </script>
            </div>
            <div class="col col-2 p-1">
                <label for="contactNum"><h5>Contact #:</h5></label>
                <input type="text" name="contactNum" class="form-control" value="{{old('contactNum')}}">
                @error('contactNum')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-1 p-1">
                <label for="age"><h5>Age:</h5></label>
                <input type="text" name="age" class="form-control" value="{{old('age')}}">
                @error('age')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 p-1">
                <label for="bDate"><h5>Birth Date:</h5></label>
                <input type="date" name="bDate" class="form-control" value="{{old('bDate')}}">
                @error('bDate')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            
        </div>

        <div class="osh-bg row m-0 mt-4 border justify-content-center">

            <div class="col col-12 my-2 text-center p-1"><h4 class="osh-outline text-center">Permits/Files/Certificates:</h4></div>

            <div class="col col-6 p-1">
                <label for="bStructure"><h5>Business Structure:</h5></label>
                <select name="bStructure" id="bStructure" class="form-select" required>
                    <option value="">------</option>
                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                    <option value="Corporation/Partnership">Corporation/Partnership</option>
                </select>
                @error('bStructure')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-6 p-1">
                <label for="dticdaCertFile"><h5>DTI/CDA Certificate:</h5></label>
                <input type="file" name="dticdaCertFile" id="dticdaCertFile" class="form-control" required onchange="set_dticdaCertFile()"> 
                <input type="text" name="get_dticdaCertFile" id="get_dticdaCertFile" hidden>
                @error('get_dticdaCertFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-6 p-1">
                <label for="busPermitFile"><h5>Business/Mayor's Permit:</h5></label>
                <input type="file" name="busPermitFile" id="busPermitFile" class="form-control" required onchange="set_busPermitFile()"> 
                <input type="text" name="get_busPermitFile" id="get_busPermitFile" hidden>
                @error('get_busPermitFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-6 p-1">
                <label for="brgyClearanceFile"><h5>Brgy. Clearance:</h5></label>
                <input type="file" name="brgyClearanceFile" id="brgyClearanceFile" class="form-control" required onchange="set_brgyClearanceFile()"> 
                <input type="text" name="get_brgyClearanceFile" id="get_brgyClearanceFile" hidden>
                @error('get_brgyClearanceFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-6 p-1">
                <label for="ctcFile"><h5>Community Tax Certificate "Cedula":</h5></label>
                <input type="file" name="ctcFile" id="ctcFile" class="form-control" required onchange="set_ctcFile()">
                <input type="text" name="get_ctcFile" id="get_ctcFile" hidden> 
                @error('get_ctcFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-6 p-1">
                <label for="contOfLeaseFile"><h5>Contract of Lease/Title of Land:</h5></label>
                <input type="file" name="contOfLeaseFile" id="contOfLeaseFile" class="form-control" required onchange="set_contOfLeaseFile()"> 
                <input type="text" name="get_contOfLeaseFile" id="get_contOfLeaseFile" hidden>
                @error('get_contOfLeaseFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-8 p-1">
                <label for="zoningClearanceFile"><h5>Zoning Clearance:</h5></label>
                <input type="file" name="zoningClearanceFile" id="zoningClearanceFile" class="form-control" required onchange="set_zoningClearanceFile()"> 
                <input type="text" name="get_zoningClearanceFile" id="get_zoningClearanceFile" hidden>
                @error('get_zoningClearanceFile')
                    <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

        </div>

        <div class="osh-bg row m-0 mt-4 border justify-content-center">

            <div class="col col-12 my-2 text-center"><h4 class="osh-outline text-center">Other Permits:</h4></div>

            <div class="col col-6 p-1">
                <label for="sanitaryFile"><h5>Sanitary Permit:</h5></label>
                <input type="file" name="sanitaryFile" id="sanitaryFile" class="form-control" onchange="set_sanitaryFile()"> 
                <input type="text" name="get_sanitaryFile" id="get_sanitaryFile" hidden>
            </div>
            <div class="col col-6 p-1">
                <label for="fireSafetyFile"><h5>Fire Safety Permit:</h5></label>
                <input type="file" name="fireSafetyFile" id="fireSafetyFile" class="form-control" onchange="set_fireSafetyFile()">
                <input type="text" name="get_fireSafetyFile" id="get_fireSafetyFile" hidden> 
            </div>

            <div class="col col-6 p-1">
                <label for="bfadFile"><h5>BFAD Permit:</h5></label>
                <input type="file" name="bfadFile" id="bfadFile" class="form-control" onchange="set_bfadFile()"> 
                <input type="text" name="get_bfadFile" id="get_bfadFile" hidden>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100"><h5>Submit</h5></button>
            </div>
            <div class="col col-6">
                <a href="{{route('business-permits.index')}}" class="btn w-100 text-white" style="background-color: #388E3C;"><h5>Cancel</h5></a>
            </div>
        </div>

        <script>
            
            function set_dticdaCertFile(){
                var get = document.getElementById('dticdaCertFile');        
                try {
                    var prep_name = get.files.item(0).name;                  
                    document.getElementById('get_dticdaCertFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_dticdaCertFile').value = '';
                }
            }

            function set_busPermitFile(){
                var get = document.getElementById('busPermitFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_busPermitFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_busPermitFile').value = '';
                }
            }

            function set_brgyClearanceFile(){
                var get = document.getElementById('brgyClearanceFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_brgyClearanceFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_brgyClearanceFile').value = '';
                }
            }

            function set_ctcFile(){
                var get = document.getElementById('ctcFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_ctcFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_ctcFile').value = '';
                }
            }

            function set_contOfLeaseFile(){
                var get = document.getElementById('contOfLeaseFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_contOfLeaseFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_contOfLeaseFile').value = '';
                }
            }

            function set_zoningClearanceFile(){
                var get = document.getElementById('zoningClearanceFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_zoningClearanceFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_zoningClearanceFile').value = '';
                }
            }

            function set_sanitaryFile(){
                var get = document.getElementById('sanitaryFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_sanitaryFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_sanitaryFile').value = '';
                }
            }

            function set_fireSafetyFile(){
                var get = document.getElementById('fireSafetyFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_fireSafetyFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_fireSafetyFile').value = '';
                }
            }

            function set_bfadFile(){
                var get = document.getElementById('bfadFile');
                try {
                    var prep_name = get.files.item(0).name;
                    document.getElementById('get_bfadFile').value = prep_name.slice(0,prep_name.lastIndexOf("."));
                } catch (error) {
                    document.getElementById('get_bfadFile').value = '';
                }
            }

        </script>

    </form>



    
@endsection
