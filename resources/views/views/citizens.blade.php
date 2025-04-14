@extends('interface.secondaryLayout')
@section('sec-title')
    Citizen | HouseHold
@endsection
@section('sec-content')
    <div class="row h-100 justify-content-center my-5">
        <div class="col col-7 border">
            <div class="card shadow">
                <div class="card-body">
                    
                    <h4>House Type: {{$house->household_type}}</h4>
                    <h4>Address: {{$house->HHoldToMun->mun_name}}, {{$house->HHoldToBrgy->brgy_name}} {{$house->HHoldToSubd->subd_name}}</h4>
                    <h4 class="mb-5">Family Income: ₱ {{$getCitizen->sum('income')}}</h4>
                    
                    
                    @foreach($getCitizen as $row)

                        

                        <h3>Personal Info:</h3>
                        <div class="row">
                            <div class="col col-6 border">
                                
                                
                                <h4>Name: </h4><h5>{{$row->lname}}, {{$row->fname}} {{$row->mname}}</h5>
                                
                            </div>
                        </div>

                        <p>Name: {{$row->fname}} {{$row->mname}} {{$row['lname']}}</p>
                        <p>Suffix: {{$row['suffix']}}</p>
                        <p>Sex: {{$row['sex']}}</p>
                        <p>Birth Date: {{$row['birth_date']}}</p>
                        <p>Contact #: {{$row['contactNum']}}</p>
                        <p>Occupation: {{$row['occupation']}}</p>
                        <p>Income: {{$row['income']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection