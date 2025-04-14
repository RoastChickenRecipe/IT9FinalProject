@extends('layouts.mainLayout')
@section('title')
    HouseHold
@endsection

@section('content')
    
    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">
            <div class="osh-outline row align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3">
                    <h1 class="text-center">HouseHold</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('createForm')}}" class="btn btn-dark w-100">Create Form</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="osh-bg col col-11 justify-content-center p-1" style="height: 570px;">
            <div class="row justify-content-center">
                <div class="col col-11 mt-1" style="height: 545px;">

                    <div class="osh-outline row text-center" style="height: 70px;">
                        <div class="col col-5 pt-3" >
                            <h4>Address</h4>
                        </div>
                        <div class="col col-1">
                            <h4>Fam. Count</h4>
                        </div>
                        <div class="col col-2 pt-3">
                            <h4>HH. Type</h4>
                        </div>
                        <div class="col col-2 pt-3">
                            <h4>Fam. Income</h4>
                        </div>
                        <div class="col col-2 pt-3">
                            <h4>Action</h4>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col col-12 text-center" style="height: 470; overflow:auto;">

                            @foreach($data as $row)

                                <div class="osh-outline row mt-1" style="height: 75px;">
                                    <div class="col col-5 pt-2">
                                        <h4>{{$row->HholdToMun->mun_name}}, {{$row->HholdToBrgy->brgy_name}} {{$row->HholdToSubd->subd_name}}</h4>
                                    </div>
                                    <div class="col col-1 pt-2">
                                        <h4>{{$row->HholdToCit->groupBy('id')->Count()}}</h4>
                                
                                    </div>
                                    <div class="col col-2 pt-2">
                                        <h4>{{$row->household_type}}</h4>
                                    </div>
                                    <div class="col col-2 pt-2">
                                        <h4>{{$row->HholdToCit->sum('income')}}</h4>
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <a href="{{url('household/view/' . $row['id'])}}" class="btn btn-success">VIEW</a>
                                    </div>
                                </div>
                                
                            @endforeach
                            
                            

                        </div>    
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection