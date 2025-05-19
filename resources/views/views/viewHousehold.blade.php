@extends('layouts.viewLayout')
@section('view-title', 'Household')

@section('floating')

    
    <div class="col col-2">
        <div class="floating-box osh-bg">

            <div class="osh-outline">
                <button type="button"  class="btn w-100 osh-btn-add" data-bs-toggle="modal" data-bs-target="#addCitizenModal">
                    <h5>Add Citizen</h5>
                </button>

                <button type="button" class="btn w-100 osh-btn-add mt-3" data-bs-toggle="modal" data-bs-target="#editHouseholdModal">
                    <h5>Edit Household</h5>
                </button>

                <!-- Button trigger modal -->
                <button type="button" class="btn w-100 osh-btn-del mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <h5>Delete Household</h5>
                </button>

            </div>

            @session('message')
                <div class="osh-outline mt-3">
                    <div class="bg-info rounded-3 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
                </div>
            @endsession
            


            <div class="osh-outline mt-5">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('households.index')}}" class="btn w-100 osh-btn-add"><h5>Go Back</h5></a>
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
                                    <a href="{{route('citizens.edit', $row->id)}}" class="btn w-100 osh-btn-add">Edit</a>
                                </div>
                                <div class="col col-6">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModal{{$row->id}}">
                                    Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal{{$row->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModal{{$row->id}}Label"><strong>DELETE | Household</strong></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('citizens.destroy', $row->id)}}" method="post" class="m-0">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="modal-body">
                                                        <h4>Are you sure you want to <strong>DELETE</strong> {{$row->lname}}, {{$row->fname}} {{$row->mname}} citizen?</h4>
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
                    <h1 class="modal-title fs-5" id="addCitizenModalLabel">Add Citizen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('citizens.store')}}" method="post">
                    @csrf
                    <div class="modal-body osh-md-bg"> 
                    
                        <div class="row m-0 mt-3">
                            <div class="col col-4 p-1">
                                <div class="osh-outline">
                                    <label for="fname"><h5>First Name:</h5></label>
                                    <input type="text" name="fname" id="fname" class="form-control" required>
                                    <input type="text" name="hholdId" class="form-control" hidden value="{{$house->id}}">
                                </div>
                            </div>
                            <div class="col col-3 p-1">
                                <div class="osh-outline">
                                    <label for="mname"><h5>Middle Name:</h5></label>
                                    <input type="text" name="mname" id="mname" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-3 p-1">
                                <div class="osh-outline">
                                    <label for="lname"><h5>Last Name:</h5></label>
                                    <input type="text" name="lname" id="lname" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="suff"><h5>Suffix:</h5></label>
                                    <input type="text" name="suff" id="suff" class="form-control" list="suffixOptions">
                                    <datalist id="suffixOptions">
                                        <option value="Jr.">
                                        <option value="Sr.">
                                    </datalist>
                                </div>
                            </div>
                        </div>
                
                        <div class="row m-0 mt-3">
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="sex"><h5>Sex:</h5></label>
                                    <select name="sex" id="sex" class="form-select" required>
                                        <option value="">----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-1 p-1">
                                <div class="osh-outline">
                                    <label for="age"><h5>Age:</h5></label>
                                    <input type="text" name="age" id="age" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="religion"><h5>Religion:</h5></label>
                                    <input type="text" name="religion" id="religion" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="frole"><h5>Family Role:</h5></label>
                                    <input type="text" name="frole" id="frole" class="form-control" list="frolelist" required>
                                    <datalist id="frolelist">
                                        <option value="Father">
                                        <option value="Mother">
                                        <option value="Child">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="bType"><h5>Blood Type:</h5></label>
                                    <input type="text" name="bType" id="bType" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-3 p-1">
                                <div class="osh-outline">
                                    <label for="contactNumber"><h5>Contact Number:</h5></label>
                                    <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
                                </div>
                            </div>
                        </div>
                
                        <div class="row m-0 mt-3">
                            <div class="col col-2 p-1">
                                <div class="osh-outline">
                                    <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>
                                    <input type="text" name="yrsOfResidency" id="yrsOfResidency" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-3 p-1 align-self-end">
                                <div class="osh-outline">
                                    <label for="birth"><h5>Birth Date:</h5></label>
                                    <input type="date" name="birth" id="birth" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-4 p-1 align-self-end">
                                <div class="osh-outline">
                                    <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>
                                    <input type="text" name="placeOfBirth" id="placeOfBirth" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-3 p-1">
                                <div class="osh-outline">
                                    <label for="educAttainment"><h5>Educational Attainment:</h5></label>
                                    <input type="text" name="educAttainment" id="educAttainment" class="form-control" required>
                                </div>
                            </div>
                        </div>
                
                        <div class="row m-0 mt-3">
                            <div class="col col-4 p-1">
                                <div class="osh-outline">
                                    <label for="citStatus"><h5>Citizen Status:</h5></label>
                                    <input type="text" name="citStatus" id="citStatus" class="form-control" list="citStatusList">
                                    <datalist id="citStatusList">
                                        <option value="Senior Citizen">
                                        <option value="Pwd(Person with Disability)">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col col-4 p-1">
                                <div class="osh-outline">
                                    <label for="empStatus"><h5>Employment Status:</h5></label>
                                    <input type="text" name="empStatus" id="empStatus" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-4 p-1">
                                <div class="osh-outline">
                                    <label for="income"><h5>Income:</h5></label>
                                    <input type="text" name="income" id="income" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-success w-100"><h5>Add citizen</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>
                        
                        
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
                <div class="modal-body osh-md-bg">
                
                    <div class="row justify-content-center m-0">
                        <div class="col col-12 p-1">
                            <div class="osh-outline">
                                <label for="householdType"><h4>Household Type:</h4></label>
                                <input type="text" name="householdType" class="form-control" list="datalistOptions" value="{{$house->household_type}}">
                                <datalist id="datalistOptions">
                                    <option value="Own House">
                                    <option value="Boarding House">
                                    <option value="Apartment">
                                </datalist>
                            </div>
                            @error('householdType')
                                <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                <script>
                                    console.log('hello');
                                    
                                    document.addEventListener('DOMContentLoaded', function(){
                                        var crDocModal = new bootstrap.Modal(document.getElementById('editHouseholdModal'));
                                        crDocModal.show();
                                    })
                                </script>
                            @enderror
                        </div>


                        <div class="col col-12 mt-2 p-1">
                            <div class="osh-outline">
                                <label for="address"><h4>Address:</h4></label>
                                <select name="address" id="address" class="form-select" onchange="getId()">
                                    <option value="{{$house->municipality_id}},{{$house->barangay_id}}:{{$house->subdivision_id}}">{{$house->HholdToMun->mun_name}} - {{$house->HholdToBrgy->brgy_name}} - {{$house->HholdToSubd->subd_name}}</option>
                                    @foreach($address as $addressRow)
                                        <option value="{{$addressRow->mun_id}},{{$addressRow->brgy_id}}:{{$addressRow->subd_id}}">{{$addressRow->mun_name}} - {{$addressRow->brgy_name}} - {{$addressRow->subd_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="mun_id" id="mun_id" class="form-control" value="{{$house->municipality_id}}" hidden>
                            <input type="text" name="brgy_id" id="brgy_id" class="form-control" value="{{$house->barangay_id}}" hidden>
                            <input type="text" name="subd_id" id="subd_id" class="form-control" value="{{$house->subdivision_id}}" hidden> 
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

                    <div class="row w-100">
                        <div class="col col-6">
                            <button type="submit" class="btn btn-success w-100"><h5>Save changes</h5></button>
                        </div>
                        <div class="col col-6">
                            <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                        </div>
                    </div>  
          
                </div>
            </form>

          </div>
        </div>
    </div>{{-- End Modal | Edit Household --}}
    
   <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel"><strong>DELETE | Household</strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('households.destroy', $house->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h4>Are you sure you want to <strong>DELETE</strong> this household?</h4>
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