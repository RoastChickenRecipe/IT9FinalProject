@extends('layouts.secondaryLayout')

@section('sec-title', 'Form | Edit Complaint')

@section('sec-content')
    
    <div class="osh-outline">
        <h1 class="osh-bg text-center">Edit Complaint</h1>
    </div>

    <form action="{{route('complainants.update', $complData->id)}}" method="post" class="m-0">
        @csrf
        @method('put')

        <div class="osh-bg mt-3">
            <div class="row m-0">
            
                <div class="col col-6 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="set_mun"><h4>Municipality:</h4></label>
                        <input type="text" id="set_mun" class="form-control" readonly disabled aria-label="Disabled input example" value="{{$complData->ComplToMun->mun_name}}">
                    </div>
                </div>
                <div class="col col-6 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="set_brgy"><h4>Barangay:</h4></label>
                        <input type="text" id="set_brgy" class="form-control" readonly disabled aria-label="Disabled input example" value="{{$complData->ComplToBrgy->brgy_name}}">
                    </div>
                </div>
                <div class="col col-4 mt-3 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="rep_date"><h4>Date Reported:</h4></label>
                        <input type="date" name="rep_date" class="form-control" value="{{$complData->date_reported}}">
                        @error('rep_date')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-8 mt-3 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="emp_name"><h4>Prepared By:</h4></label>
                        <input type="text" name="emp_name" readonly value="{{$emp->e_fname}} {{$emp->e_lname}}" class="form-control" disabled aria-label="Disabled input example">
                    </div>
                </div>
            </div>
        </div>

        <div class="osh-bg mt-4">
            <div class="row m-0">
            
                <div class="col col-12 p-0">
                    <h3 class="osh-outline">Complainant Details:</h3>
                </div>
                <div class="col col-6 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="com_fname"><h4>First Name:</h4></label>
                        <input type="text" name="com_fname" value="{{$complData->com_fname}}" class="form-control">
                        @error('com_fname')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-6 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="com_lname"><h4>Last Name:</h4></label>
                        <input type="text" name="com_lname" value="{{$complData->com_lname}}" class="form-control">
                        @error('com_lname')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col col-4 mt-3 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="com_conNum"><h4>Contact Number:</h4></label>
                        <input type="text" name="com_conNum" value="{{$complData->com_contactNum}}" class="form-control">
                        @error('com_conNum')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-8 mt-3 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="address"><h4>Address:</h4></label>
                        <select name="address" id="address" class="form-select"  onchange="getId()">
                            <option value="{{$complData->com_mun_id}},{{$complData->com_brgy_id}}:{{$complData->com_subd_id}}">{{$complData->ComplToMun->mun_name}}, {{$complData->ComplToBrgy->brgy_name}} - {{$complData->ComplToSubd->subd_name}}</option>
                            @foreach($address as $row)
                                <option value="{{$row->mun_id}},{{$row->brgy_id}}:{{$row->subd_id}}">{{$row->mun_name}}, {{$row->brgy_name}} - {{$row->subd_name}}</option>
                            @endforeach
                        </select>
                        @error('address')
                            <span style="background-color: red; color: red">* {{$message}}</span>
                        @enderror
                    </div>
                    <input type="text" name="mun_id" id="mun_id" class="form-control" value="{{$complData->com_mun_id}}" hidden>
                    <input type="text" name="brgy_id" id="brgy_id" class="form-control" value="{{$complData->com_brgy_id}}" hidden>
                    <input type="text" name="subd_id" id="subd_id" class="form-control" value="{{$complData->com_subd_id}}" hidden>

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
                                let get_brgy = text.slice(text.indexOf(',')+2, text.indexOf('-') - 1);
                                let get_mun = text.slice(0, text.indexOf(','));
                                document.getElementById('mun_id').value = formun;
                                document.getElementById("brgy_id").value = forbrgy;
                                document.getElementById("subd_id").value = forsubd;
                                document.getElementById("set_brgy").setAttribute('value', get_brgy);
                                document.getElementById("set_mun").setAttribute('value', get_mun);
                            }else{
                                document.getElementById('mun_id').value = '';
                                document.getElementById("brgy_id").value = '';
                                document.getElementById("subd_id").value = '';
                                document.getElementById("set_brgy").setAttribute('value', '');
                                document.getElementById("set_mun").setAttribute('value', '');
                            }
                        }
                    </script>
                </div>
            </div>
        </div>

        <div class="osh-bg mt-5">
            <div class="row m-0">
                <div class="col col-12 p-0">
                    <h3 class="osh-outline">Other Details:</h3>
                </div>
                <div class="coo col-8 align-self-end p-0">
                    <div class="osh-outline">
                        <label for="defendant"><h4>Defendant Name:</h4></label>
                        <input type="text" name="defendant" value="{{$complData->def_name}}" class="form-control">
                        @error('defendant')
                            <span class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col col-4 mt-3 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="defContact"><h4>Defendant Contact Number:</h4></label>
                        <input type="text" name="defContact" placeholder="( If Any )" value="{{$complData->def_conNum}}" class="form-control">
                        @error('defContact')
                            <span class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col col-8 mt-3 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="defAddress"><h4>Defendant Address:</h4></label>
                        <input type="text" name="defAddress" placeholder="( If Any )" value="{{$complData->def_address}}" class="form-control">
                        @error('defAddress')
                            <span class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            
            </div>
        </div>

        {{-- For Buttons --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100"><h5>Update</h5></button>
            </div>
            <div class="col col-6">
                <a href="{{route('complainants.show', $complData->id)}}" class="btn w-100 text-white" style="background-color: #388E3C;"><h5>Cancel</h5></a>
            </div>
        </div>

    </form>

@endsection