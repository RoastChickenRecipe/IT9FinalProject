@extends('layouts.viewLayout')
@section('view-title', 'Household')

@section('floating')

    
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline">
                <button type="button" class="osh-btn-add btn w-100" data-bs-toggle="modal" data-bs-target="#addCitizenModal">
                    <h5>Add Citizen</h5>
                </button>
            </div>
            


            <div class="osh-outline mt-5">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('households.index')}}" class="osh-btn-back btn w-100"><h5>Go Back</h5></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
    
@endsection

@section('view-content')
    
                    
    <div class="osh-bg">
        <div class="row justify-content-center">
            <div class="col col-4 text-center">
                <h3 class="osh-outline">HouseHold Info:</h3>
            </div>
        </div>
        <h4 class="osh-outline">House Type: {{$house->household_type}}</h4>
        <h4 class="osh-outline">Address: {{$house->HHoldToMun->mun_name}}, {{$house->HHoldToBrgy->brgy_name}} {{$house->HHoldToSubd->subd_name}}</h4>
        <h4 class="osh-outline">Family Income: ₱ {{$getCitizen->sum('income')}}</h4>
        <div class="osh-outline row mx-0">
            <div class="col col-6">
                {{--<a href="{{route('households.edit', $house->id)}}" class="btn btn-dark w-100"><h5>Edit Household</h5></a>--}}
                <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#editHouseholdModal">
                    <h5>Edit Household</h5>
                </button>
            </div>
            <div class="col col-6">
                <form action="{{route('households.destroy', $house->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger w-100"><h5>Delete Household</h5></button>
                </form>
            </div>
        </div>
    </div>

    
    
    
    @foreach($getCitizen as $row)

        <div class="osh-bg mt-5">
            <h3 class="osh-outline">Personal Info:</h3>
            
            <div class="row justify-content-around">

                {{-- Left --}}
                <div class="col col-5 align-self-center">

                    <div class="osh-outline row">


                        <div class="col col-12 p-0">
                            <h4>Name: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->lname}}, {{$row->fname}} {{$row->mname}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Suffix: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->suffix}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Sex: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->sex}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Age: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->age}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Family Role: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->family_role}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Religion: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->religion}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Blood Type: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->blood_type}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Yrs. Of Residency: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->years_of_residency}}</h5>
                        </div>


                    </div>

                </div>

                {{-- Right --}}
                <div class="col col-5 align-self-center">

                    <div class="osh-outline row">

                        <div class="col col-12 p-0">
                            <h4>Contact Number: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->contactNum}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Birth Date: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->birth_date}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Place of Birth: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->place_of_birth}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Citizen Status: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->citizen_status}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Educational Attainment: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->educational_attainment}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Employment Status: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->employment_status}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <h4>Income: </h4>
                            <h5 style="border-bottom: solid 2px black;">{{$row->income}}</h5>
                        </div>
                        <div class="col col-12 p-0">
                            <div class="row mt-4 mb-2">
                                <div class="col col-6">
                                    <a href="{{route('citizens.edit', $row->id)}}" class="btn btn-dark w-100">Edit</a>
                                </div>
                                <div class="col col-6">
                                    <form action="{{route('citizens.destroy', $row->id)}}" method="post" class="m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            
        </div>
    @endforeach

    {{-- Modal | Add citizen --}}
    <div class="modal fade" id="addCitizenModal" tabindex="-1" aria-labelledby="addCitizenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCitizenModalLabel">Add Household:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('citizens.store')}}" method="post">
                    @csrf
                    <div class="modal-body"> 
                    
                        <div class="row mt-2">
                            <div class="col col-4">
                                <label for="fname"><h5>First Name:</h5></label>
                                <input type="text" name="fname" id="fname" class="form-control" required>
                                <input type="text" name="hholdId" class="form-control" hidden value="{{$house->id}}">
                            </div>
                            <div class="col col-3">
                                <label for="mname"><h5>Middle Name:</h5></label>
                                <input type="text" name="mname" id="mname" class="form-control" required>
                            </div>
                            <div class="col col-3">
                                <label for="lname"><h5>Last Name:</h5></label>
                                <input type="text" name="lname" id="lname" class="form-control" required>
                            </div>
                            <div class="col col-2">
                                <label for="suff"><h5>Suffix:</h5></label>
                                <input type="text" name="suff" id="suff" class="form-control" list="suffixOptions">
                                <datalist id="suffixOptions">
                                    <option value="Jr.">
                                    <option value="Sr.">
                                </datalist>
                            </div>
                        </div>
                
                        <div class="row mt-2">
                            <div class="col col-2">
                                <label for="sex"><h5>Sex:</h5></label>
                                <select name="sex" id="sex" class="form-select" required>
                                    <option value="">----</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col col-1">
                                <label for="age"><h5>Age:</h5></label>
                                <input type="text" name="age" id="age" class="form-control" required>
                            </div>
                            <div class="col col-2">
                                <label for="religion"><h5>Religion:</h5></label>
                                <input type="text" name="religion" id="religion" class="form-control" required>
                            </div>
                            <div class="col col-2">
                                <label for="frole"><h5>Family Role:</h5></label>
                                <input type="text" name="frole" id="frole" class="form-control" list="frolelist" required>
                                <datalist id="frolelist">
                                    <option value="Father">
                                    <option value="Mother">
                                    <option value="Child">
                                </datalist>
                            </div>
                            <div class="col col-2">
                                <label for="bType"><h5>Blood Type:</h5></label>
                                <input type="text" name="bType" id="bType" class="form-control" required>
                            </div>
                            <div class="col col-3">
                                <label for="contactNumber"><h5>Contact Number:</h5></label>
                                <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
                            </div>
                        </div>
                
                        <div class="row mt-2">
                            <div class="col col-2">
                                <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>
                                <input type="text" name="yrsOfResidency" id="yrsOfResidency" class="form-control" required>
                            </div>
                            <div class="col col-3 align-self-end">
                                <label for="birth"><h5>Birth Date:</h5></label>
                                <input type="date" name="birth" id="birth" class="form-control" required>
                            </div>
                            <div class="col col-4 align-self-end">
                                <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>
                                <input type="text" name="placeOfBirth" id="placeOfBirth" class="form-control" required>
                            </div>
                            <div class="col col-3">
                                <label for="educAttainment"><h5>Educational Attainment:</h5></label>
                                <input type="text" name="educAttainment" id="educAttainment" class="form-control" required>
                            </div>
                        </div>
                
                        <div class="row mt-2">
                            <div class="col col-4">
                                <label for="citStatus"><h5>Citizen Status:</h5></label>
                                <input type="text" name="citStatus" id="citStatus" class="form-control" list="citStatusList">
                                <datalist id="citStatusList">
                                    <option value="Senior Citizen">
                                    <option value="Pwd(Person with Disability)">
                                </datalist>
                            </div>
                            <div class="col col-4">
                                <label for="empStatus"><h5>Employment Status:</h5></label>
                                <input type="text" name="empStatus" id="empStatus" class="form-control" required>
                            </div>
                            <div class="col col-4">
                                <label for="income"><h5>Income:</h5></label>
                                <input type="text" name="income" id="income" class="form-control" required>
                            </div>
                        </div>
                    
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Add citizen</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div> {{-- End Modal | Add citizen --}}

    {{-- Modal | Edit Household --}}
    <div class="modal fade" id="editHouseholdModal" tabindex="-1" aria-labelledby="editHouseholdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editHouseholdModalLabel">Edit Household</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('households.update', $house->id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                
                    <div class="row justify-content-center">
                        <div class="col col-6">
                            <label for="householdType"><h4>Household Type:</h4></label>
                            <input type="text" name="householdType" class="form-control" value="{{$house->household_type}}">
                            @error('householdType')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col col-12">
                            <label for="address"><h4>Address:</h4></label>
                            <select name="address" id="address" class="form-select" onchange="getId()">
                                <option value="{{$house->municipality_id}},{{$house->barangay_id}}:{{$house->subdivision_id}}">{{$house->HholdToMun->mun_name}} - {{$house->HholdToBrgy->brgy_name}} - {{$house->HholdToSubd->subd_name}}</option>
                                @foreach($address as $addressRow)
                                    <option value="{{$addressRow->mun_id}},{{$addressRow->brgy_id}}:{{$addressRow->subd_id}}">{{$addressRow->mun_name}} - {{$addressRow->brgy_name}} - {{$addressRow->subd_name}}</option>
                                @endforeach
                            </select>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
                </div>
            </form>

          </div>
        </div>
    </div>{{-- End Modal | Edit Household --}}
    
    {{-- Modal | Edit Citizen --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
      

@endsection