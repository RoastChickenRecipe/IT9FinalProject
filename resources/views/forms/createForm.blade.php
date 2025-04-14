<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Citizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center my-5">
            <div class="col col-10">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Citizen Form</h1>
                        
                        <form action="{{route('createHousehold')}}" method="post">
                            @csrf

                            {{-- HOUSE INFO --}}
                            <div class="row border mt-5">
                                <div class="col col-12">
                                    <h3>House Info:</h3>
                                </div>
                                <div class="col col-6">
                                    <label for="htype" class="form-label"><h5>House Type</h5></label>
                                    <input class="form-control" name="htype" id="htype" list="datalistOptions">
                                    <datalist id="datalistOptions">
                                        <option value="Own House">
                                        <option value="Boarding House">
                                        <option value="Apartment">
                                    </datalist>
                                    @error('htype')
                                        <span style="color: red">* {{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            {{-- ADDRESS INFO --}}
                            <div class="row border mt-3">
                                <div class="col col-12">
                                    <h3>Address</h3>                        
                                </div>
                                
                                <div class="col col-4">
                                    <label for="s_mun">Municipality</label>
                                    <select name="s_mun" id="s_mun" class="form-select">
                                        <option value="">None</option>
                                        @foreach($mun as $row)
                                            <option value="{{$row['id']}}">{{$row['mun_name']}}</option>
                                        @endforeach
    
                                    </select>
                                    @error('s_mun')
                                        <span style="color: red">* {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col col-4">
                                    <label for="s_brgy">Barangay</label>
                                    <select name="s_brgy" id="s_brgy" class="form-select">
                                        <option value="">None</option>
                                        @foreach($brgy as $row)
                                            <option value="{{$row['id']}}">{{$row['brgy_name']}}</option>
                                        @endforeach
    
                                    </select>
                                    @error('s_brgy')
                                        <span style="color: red">* {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col col-4">
                                    <label for="s_subd">Subdivision</label>
                                    <select name="s_subd" id="s_subd" class="form-select">
                                        <option value="">None</option>
                                        @foreach($subd as $row)
                                            <option value="{{$row['id']}}">{{$row['subd_name']}}</option>
                                        @endforeach
    
                                    </select>
                                    @error('s_subd')
                                        <span style="color: red">* {{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>



                            {{-- PERSONAL INFO --}}
                            <div class="row border mt-3">
                                <div class="col col-12">
                                    <h3>Personal Info:</h3>     
                                </div>

                                <div class="col col-4 mt-2">
                                    <label for="fname"><h5>First Name:</h5></label>
                                    <input type="text" name="fname[]" id="fname" class="form-control" required>
                                </div>
                                <div class="col col-3 mt-2">
                                    <label for="mname"><h5>Middle Name:</h5></label>
                                    <input type="text" name="mname[]" id="mname" class="form-control" required>
                                </div>
                                <div class="col col-3 mt-2">
                                    <label for="lname"><h5>Last Name:</h5></label>
                                    <input type="text" name="lname[]" id="lname" class="form-control" required>
                                </div>
                                <div class="col col-2 mt-2">
                                    <label for="suff"><h5>Suffix:</h5></label>
                                    <input type="text" name="suff[]" id="suff" class="form-control" list="suffixOptions">
                                    <datalist id="suffixOptions">
                                        <option value="Jr.">
                                        <option value="Sr.">
                                    </datalist>
                                </div>

                                <div class="col col-2 mt-2">
                                    <label for="sex"><h5>Sex:</h5></label>
                                    <select name="sex[]" id="sex" class="form-select" required>
                                        <option value="">----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col col-1 mt-2">
                                    <label for="age"><h5>Age:</h5></label>
                                    <input type="text" name="age[]" id="age" class="form-control" required>
                                </div>
                                <div class="col col-2 mt-2">
                                    <label for="religion"><h5>Religion:</h5></label>
                                    <input type="text" name="religion[]" id="religion" class="form-control" required>
                                </div>
                                <div class="col col-2 mt-2">
                                    <label for="frole"><h5>Family Role:</h5></label>
                                    <input type="text" name="frole[]" id="frole" class="form-control" list="frolelist" required>
                                    <datalist id="frolelist">
                                        <option value="Father">
                                        <option value="Mother">
                                        <option value="Child">
                                    </datalist>
                                </div>
                                <div class="col col-2 mt-2">
                                    <label for="bType"><h5>Blood Type:</h5></label>
                                    <input type="text" name="bType[]" id="bType" class="form-control" required>
                                </div>
                                <div class="col col-3 mt-2">
                                    <label for="contactNumber"><h5>Contact Number:</h5></label>
                                    <input type="text" name="contactNumber[]" id="contactNumber" class="form-control" required>
                                </div>

                                <div class="col col-2 mt-2">
                                    <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>
                                    <input type="text" name="yrsOfResidency[]" id="yrsOfResidency" class="form-control" required>
                                </div>
                                <div class="col col-3 mt-2">
                                    <label for="birth"><h5>Birth Date:</h5></label>
                                    <input type="date" name="birth[]" id="birth" class="form-control" required>
                                </div>
                                <div class="col col-4 mt-2">
                                    <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>
                                    <input type="text" name="placeOfBirth[]" id="placeOfBirth" class="form-control" required>
                                </div>
                                <div class="col col-3 mt-2">
                                    <label for="educAttainment"><h5>Educational Attainment:</h5></label>
                                    <input type="text" name="educAttainment[]" id="educAttainment" class="form-control" required>
                                </div>

                                <div class="col col-4 mt-2">
                                    <label for="citStatus"><h5>Citizen Status:</h5></label>
                                    <input type="text" name="citStatus[]" id="citStatus" class="form-control" list="citStatusList">
                                    <datalist id="citStatusList">
                                        <option value="Senior Citizen">
                                        <option value="Pwd(Person with Disability)">
                                    </datalist>
                                </div>
                                <div class="col col-4 mt-2">
                                    <label for="empStatus"><h5>Employment Status:</h5></label>
                                    <input type="text" name="empStatus[]" id="empStatus" class="form-control" required>
                                </div>
                                <div class="col col-4 mt-2">
                                    <label for="income"><h5>Income:</h5></label>
                                    <input type="text" name="income[]" id="income" class="form-control" required>
                                </div>

                            </div>

                            <div class="row justify-content-end mt-3">
                                <div class="col col-2">
                                    <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary w-100">Add More</a>
                                </div>
                            </div>

                            {{-- NEW FORM --}}
                            <div class="paste-new-form">


                            </div>


                            {{-- SUBMIT FORM --}}
                            <div class="row mt-4">
                                <div class="col col-6">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                                <div class="col col-6">
                                    <a href="{{route('view.household')}}" class="btn btn-dark w-100">Cancel</a>
                                </div>
                            </div>

                        </form>
        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function (){
            $(document).on('click', '.remove-form', function (){
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function(){
                $('.paste-new-form').append('<div class="row border mt-3 main-form">\
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
</body>
</html>

