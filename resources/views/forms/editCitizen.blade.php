@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Citizen')
    
@section('sec-content')
    
    <form action="{{route('citizens.update', $citData->id)}}" method="post" class="m-0">
        @csrf
        @method('put')

        <div class="row mt-2">
            <div class="col col-12 osh-bg p-1">
                <h3>Edit Personal Info:</h3>
            </div>
        </div>

        <div class="row mt-2">

            <div class="col col-4 mt-2 p-1">
                <div class="osh-bg">
                    <label for="fname"><h5>First Name:</h5></label>
                    <input type="text" name="fname" id="fname" class="form-control" value="{{$citData->fname}}">
                    <input type="text" name="hholdId" value="{{$citData->household_id}}" hidden>
                    @error('fname')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-3 mt-2 p-1">
                <div class="osh-bg">
                    <label for="mname"><h5>Middle Name:</h5></label>
                    <input type="text" name="mname" id="mname" class="form-control" value="{{$citData->mname}}">
                    @error('mname')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-3 mt-2 p-1">
                <div class="osh-bg">
                    <label for="lname"><h5>Last Name:</h5></label>
                    <input type="text" name="lname" id="lname" class="form-control" value="{{$citData->lname}}">
                    @error('lname')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="suff"><h5>Suffix:</h5></label>
                    <input type="text" name="suff" id="suff" class="form-control" list="suffixOptions" value="{{$citData->suffix}}">
                    <datalist id="suffixOptions">
                        <option value="Jr.">
                        <option value="Sr.">
                    </datalist>
                    @error('suff')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row mt-2">

            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="sex"><h5>Sex:</h5></label>
                    <select name="sex" id="sex" class="form-select">
                        <option value="{{$citData->fname}}">{{$citData->sex}}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('sex')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-1 mt-2 p-1">
                <div class="osh-bg">
                    <label for="age"><h5>Age:</h5></label>
                    <input type="text" name="age" id="age" class="form-control" value="{{$citData->age}}">
                    @error('age')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="religion"><h5>Religion:</h5></label>
                    <input type="text" name="religion" id="religion" class="form-control" value="{{$citData->religion}}">
                    @error('religion')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="frole"><h5>Family Role:</h5></label>
                    <input type="text" name="frole" id="frole" class="form-control" list="frolelist" value="{{$citData->family_role}}">
                    <datalist id="frolelist">
                        <option value="Father">
                        <option value="Mother">
                        <option value="Child">
                    </datalist>
                    @error('frole')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="bType"><h5>Blood Type:</h5></label>
                    <input type="text" name="bType" id="bType" class="form-control" value="{{$citData->blood_type}}">
                    @error('bType')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-3 mt-2 p-1">
                <div class="osh-bg">
                    <label for="contactNumber"><h5>Contact Number:</h5></label>
                    <input type="text" name="contactNumber" id="contactNumber" class="form-control" value="{{$citData->contactNum}}">
                    @error('contactNumber')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row mt-2">

            <div class="col col-2 mt-2 p-1">
                <div class="osh-bg">
                    <label for="yrsOfResidency"><h5>Yrs. of Residency</h5></label>
                    <input type="text" name="yrsOfResidency" id="yrsOfResidency" class="form-control" value="{{$citData->years_of_residency}}">
                    @error('yrsOfResidency')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-3 mt-2 p-1 align-self-end">
                <div class="osh-bg">
                    <label for="birth"><h5>Birth Date:</h5></label>
                    <input type="date" name="birth" id="birth" class="form-control" value="{{$citData->birth_date}}">
                    @error('birth')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-4 mt-2 p-1 align-self-end">
                <div class="osh-bg">
                    <label for="placeOfBirth"><h5>Place Of Birth:</h5></label>
                    <input type="text" name="placeOfBirth" id="placeOfBirth" class="form-control" value="{{$citData->place_of_birth}}">
                    @error('placeOfBirth')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-3 mt-2 p-1">
                <div class="osh-bg">
                    <label for="educAttainment"><h5>Educational Attainment:</h5></label>
                    <input type="text" name="educAttainment" id="educAttainment" class="form-control" value="{{$citData->educational_attainment}}">
                    @error('educAttainment')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>

        </div>


        <div class="row mt-2">
            
            <div class="col col-4 mt-2 p-1">
                <div class="osh-bg">
                    <label for="citStatus"><h5>Citizen Status:</h5></label>
                    <input type="text" name="citStatus" id="citStatus" class="form-control" list="citStatusList" value="{{$citData->citizen_status}}">
                    <datalist id="citStatusList">
                        <option value="Senior Citizen">
                        <option value="Pwd(Person with Disability)">
                    </datalist>
                    @error('citStatus')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-4 mt-2 p-1">
                <div class="osh-bg">
                    <label for="empStatus"><h5>Employment Status:</h5></label>
                    <input type="text" name="empStatus" id="empStatus" class="form-control" value="{{$citData->employment_status}}">
                    @error('empStatus')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col col-4 mt-2 p-1">
                <div class="osh-bg">
                    <label for="income"><h5>Income:</h5></label>
                    <input type="text" name="income" id="income" class="form-control" value="{{$citData->income}}">
                    @error('income')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100"><h5>Update</h5></button>
            </div>
            <div class="col col-6">
                <a href="{{route('households.show', $citData->household_id)}}" class="btn osh-btn-cancel w-100"><h5>Cancel</h5></a>
            </div>
        </div>

    </form>


@endsection