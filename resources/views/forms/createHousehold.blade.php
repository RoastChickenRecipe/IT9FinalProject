@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Citizen')
    
@section('sec-content')               
                        
    <form action="{{route('households.store')}}" method="post">
        @csrf

        <h1 class="osh-bg text-center">Citizen Form</h1>

        {{-- HOUSE INFO --}}
        <div class="osh-bg row border mt-5">
            
            <div class="col col-6 p-0 pe-1">
                <div class="osh-outline">
                    <label for="htype" class="form-label"><h5>House Type</h5></label>
                    <input class="form-control" name="htype" id="htype" list="datalistOptions" value="{{old('htype')}}">
                    <datalist id="datalistOptions">
                        <option value="Own House">
                        <option value="Boarding House">
                        <option value="Apartment">
                    </datalist>
                    @error('htype')
                        <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col col-6 p-0 ps-1">
                <div class="osh-outline">
                    <label for="address" class="form-label"><h5>Address</h5></label>
                    <select name="address" id="address" class="form-select"  onchange="getId()">
                        <option value="">None</option>
                        @foreach($address as $row)
                            <option value="{{$row->mun_id}},{{$row->brgy_id}}:{{$row->subd_id}}">{{$row->mun_name}} - {{$row->brgy_name}} - {{$row->subd_name}}</option>
                        @endforeach
                    </select>
                    @error('address')
                        <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
                <input type="text" name="mun_id" id="mun_id" class="form-control" hidden>
                <input type="text" name="brgy_id" id="brgy_id" class="form-control" hidden>
                <input type="text" name="subd_id" id="subd_id" class="form-control" hidden> 

            </div>

            <script>

                function getId(){
                    var check = document.getElementById('address').value;
                    var selected = document.getElementById('address');
                
                    if(check){
                        var data = selected.options[selected.selectedIndex].value;
                        let formun = data.slice(0, data.indexOf(","));
                        let forbrgy = data.slice(data.indexOf(",") + 1, data.indexOf(":"));
                        let forsubd = data.slice(data.indexOf(":") + 1);

                        document.getElementById('mun_id').value = formun;
                        document.getElementById("brgy_id").value = forbrgy;
                        document.getElementById("subd_id").value = forsubd;
                    }else{
                        document.getElementById('mun_id').value = '';
                        document.getElementById("brgy_id").value = '';
                        document.getElementById("subd_id").value = '';
                    }

                }

            </script>
        </div>

        {{-- PERSONAL INFO --}}
        <div class="osh-bg row mt-3">
            <div class="col col-12">
                <h3>Personal Info:</h3>     
            </div>

            <div class="col col-4 mt-2">
                <label for="fname"><h5>First Name:</h5></label>
                <input type="text" name="fname" id="fname" class="form-control" value="{{old('fname')}}" >
                @error('fname')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 mt-2">
                <label for="mname"><h5>Middle Name:</h5></label>
                <input type="text" name="mname" id="mname" class="form-control" value="{{old('mname')}}" >
                @error('mname')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 mt-2">
                <label for="lname"><h5>Last Name:</h5></label>
                <input type="text" name="lname" id="lname" class="form-control" value="{{old('lname')}}" >
                @error('lname')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-2 mt-2">
                <label for="suff"><h5>Suffix:</h5></label>
                <input type="text" name="suff" id="suff" class="form-control" list="suffixOptions" value="{{old('suff')}}">
                <datalist id="suffixOptions">
                    <option value="Jr.">
                    <option value="Sr.">
                </datalist>
                @error('suff')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-2 mt-2">
                <label for="sex"><h5>Sex:</h5></label>
                <select name="sex" id="sex" class="form-select" >
                    <option value="">----</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('sex')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-1 mt-2">
                <label for="age"><h5>Age:</h5></label>
                <input type="text" name="age" id="age" class="form-control" value="{{old('age')}}" >
                @error('age')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-2 mt-2">
                <label for="religion"><h5>Religion:</h5></label>
                <input type="text" name="religion" id="religion" class="form-control" value="{{old('religion')}}" >
                @error('religion')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-2 mt-2">
                <label for="frole"><h5>Family Role:</h5></label>
                <input type="text" name="frole" id="frole" class="form-control" list="frolelist" value="{{old('frole')}}" >
                <datalist id="frolelist">
                    <option value="Father">
                    <option value="Mother">
                    <option value="Child">
                </datalist>
                @error('frole')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-2 mt-2">
                <label for="bType"><h5>Blood Type:</h5></label>
                <input type="text" name="bType" id="bType" class="form-control" value="{{old('bType')}}" >
                @error('bType')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 mt-2">
                <label for="contactNumber"><h5>Contact Number:</h5></label>
                <input type="text" name="contactNumber" id="contactNumber" class="form-control" value="{{old('contactNumber')}}" >
                @error('contactNumber')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-2 mt-2">
                <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>
                <input type="text" name="yrsOfResidency" id="yrsOfResidency" class="form-control" value="{{old('yrsOfResidency')}}" >
                @error('yrsOfResidency')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 mt-2">
                <label for="birth"><h5>Birth Date:</h5></label>
                <input type="date" name="birth" id="birth" class="form-control" value="{{old('birth')}}" >
                @error('birth')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-4 mt-2">
                <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>
                <input type="text" name="placeOfBirth" id="placeOfBirth" class="form-control" value="{{old('placeOfBirth')}}" >
                @error('placeOfBirth')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-3 mt-2">
                <label for="educAttainment"><h5>Educational Attainment:</h5></label>
                <input type="text" name="educAttainment" id="educAttainment" class="form-control" value="{{old('educAttainment')}}" >
                @error('educAttainment')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-4 mt-2">
                <label for="citStatus"><h5>Citizen Status:</h5></label>
                <input type="text" name="citStatus" id="citStatus" class="form-control" list="citStatusList"  value="{{old('citStatus')}}">
                <datalist id="citStatusList">
                    <option value="Senior Citizen">
                    <option value="Pwd(Person with Disability)">
                </datalist>
                @error('citStatus')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-4 mt-2">
                <label for="empStatus"><h5>Employment Status:</h5></label>
                <input type="text" name="empStatus" id="empStatus" class="form-control" value="{{old('empStatus')}}" >
                @error('empStatus')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-4 mt-2">
                <label for="income"><h5>Income:</h5></label>
                <input type="text" name="income" id="income" class="form-control" value="{{old('income')}}" >
                @error('income')
                    <div class="mt-1 text-center text-danger" style="border-radius:10px;">{{$message}}</div>
                @enderror
            </div>

        </div>

        {{-- SUBMIT FORM --}}
        <div class="row mt-4">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100"><h5>Submit</h5></button>
            </div>
            <div class="col col-6">
                <a href="{{route('households.index')}}" class="btn osh-btn-cancel w-100"><h5>Cancel</h5></a>
            </div>
        </div>

    </form>
        
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function (){
            $(document).on('click', '.remove-form', function (){
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function(){
                $('.paste-new-form').append('<div class="osh-bg row border mt-3 main-form">\
                                <div class="col col-10">\
                                    <h3>Personal Info:</h3>\
                                </div>\
                                <div class="col col-2">\
                                    <a href="javascript:void(0)" class="remove-form float-end btn btn-danger w-100">Remove</a>\
                                </div>\
                                <div class="col col-4 mt-2">\
                                    <label for="fname"><h5>First Name:</h5></label>\
                                    <input type="text" name="fname[]" id="fname" class="form-control" required>\
                                </div>\
                                <div class="col col-3 mt-2">\
                                    <label for="mname"><h5>Middle Name:</h5></label>\
                                    <input type="text" name="mname[]" id="mname" class="form-control" required>\
                                </div>\
                                <div class="col col-3 mt-2">\
                                    <label for="lname"><h5>Last Name:</h5></label>\
                                    <input type="text" name="lname[]" id="lname" class="form-control" required>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="suff"><h5>Suffix:</h5></label>\
                                    <input type="text" name="suff[]" id="suff" class="form-control" list="suffixOptions">\
                                    <datalist id="suffixOptions">\
                                        <option value="Jr.">\
                                        <option value="Sr.">\
                                    </datalist>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="sex"><h5>Sex:</h5></label>\
                                    <select name="sex[]" id="sex" class="form-select">\
                                        <option value="">----</option>\
                                        <option value="Male">Male</option>\
                                        <option value="Female">Female</option>\
                                    </select>\
                                </div>\
                                <div class="col col-1 mt-2">\
                                    <label for="age"><h5>Age:</h5></label>\
                                    <input type="text" name="age[]" id="age" class="form-control" required>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="religion"><h5>Religion:</h5></label>\
                                    <input type="text" name="religion[]" id="religion" class="form-control" required>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="frole"><h5>Family Role:</h5></label>\
                                    <input type="text" name="frole[]" id="frole" class="form-control" list="frolelist" required>\
                                    <datalist id="frolelist">\
                                        <option value="Father">\
                                        <option value="Mother">\
                                        <option value="Child">\
                                    </datalist>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="bType"><h5>Blood Type:</h5></label>\
                                    <input type="text" name="bType[]" id="bType" class="form-control" required>\
                                </div>\
                                <div class="col col-3 mt-2">\
                                    <label for="contactNumber"><h5>Contact Number:</h5></label>\
                                    <input type="text" name="contactNumber[]" id="contactNumber" class="form-control" required>\
                                </div>\
                                <div class="col col-2 mt-2">\
                                    <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>\
                                    <input type="text" name="yrsOfResidency[]" id="yrsOfResidency" class="form-control" required>\
                                </div>\
                                <div class="col col-3 mt-2">\
                                    <label for="birth"><h5>Birth Date:</h5></label>\
                                    <input type="date" name="birth[]" id="birth" class="form-control" required>\
                                </div>\
                                <div class="col col-4 mt-2">\
                                    <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>\
                                    <input type="text" name="placeOfBirth[]" id="placeOfBirth" class="form-control" required>\
                                </div>\
                                <div class="col col-3 mt-2">\
                                    <label for="educAttainment"><h5>Educational Attainment:</h5></label>\
                                    <input type="text" name="educAttainment[]" id="educAttainment" class="form-control" required>\
                                </div>\
                                <div class="col col-4 mt-2">\
                                    <label for="citStatus"><h5>Citizen Status:</h5></label>\
                                    <input type="text" name="citStatus[]" id="citStatus" class="form-control" list="citStatusList">\
                                    <datalist id="citStatusList">\
                                        <option value="Senior Citizen">\
                                        <option value="Pwd(Person with Disability)">\
                                        <option value="Child">\
                                    </datalist>\
                                </div>\
                                <div class="col col-4 mt-2">\
                                    <label for="empStatus"><h5>Employment Status:</h5></label>\
                                    <input type="text" name="empStatus[]" id="empStatus" class="form-control" required>\
                                </div>\
                                <div class="col col-4 mt-2">\
                                    <label for="income"><h5>Income:</h5></label>\
                                    <input type="text" name="income[]" id="income" class="form-control" required>\
                                </div>\
                            </div>');
            });

        });
    </script>
@endsection

