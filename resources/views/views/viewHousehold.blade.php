@extends('views.viewLayout')
@section('view-title', 'Household')

@section('view-content')
    
                    
    <div class="osh-bg mb-5">
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
                <a href="{{route('households.edit', $house->id)}}" class="btn btn-dark w-100"><h5>Edit Household</h5></a>
            </div>
            <div class="col col-6">
                <form action="" method="post" class="m-0">
                    <button type="submit" class="btn btn-danger w-100"><h5>Delete Household</h5></button>
                </form>
            </div>
        </div>
    </div>

    <div class="osh-bg mb-5">
        <div class="row">
            <div class="col col-6 text-center">
                <a href="" class="osh-btn-add btn w-100"><h5>Add Citizen</h5></a>
            </div>
            <div class="col col-6 text-center">
                <a href="{{route('view.household')}}" class="osh-btn-back btn w-100"><h5>Go Back</h5></a>
            </div>
        </div>
    </div>
    
    
    @foreach($getCitizen as $row)

        <div class="osh-bg">
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
                                    <a href="" class="btn btn-dark w-100">Edit</a>
                                </div>
                                <div class="col col-6">
                                    <form action="" method="post" class="m-0">
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


@endsection