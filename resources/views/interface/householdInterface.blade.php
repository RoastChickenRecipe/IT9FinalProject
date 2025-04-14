@extends('interface.mainLayout')
@section('title')
    HouseHold
@endsection

@section('content')
    
    {{-- HEADER --}}
    <div class="row border mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">
            <div class="row border align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3 border ">
                    <h1 class="text-center" style="color: white">HouseHold</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('createForm')}}" class="btn btn-dark w-100">Create Form</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col col-11 border justify-content-center p-1" style="height: 570px; background-color:hsl(90, 2%, 52%); border-radius:10px;">
            <div class="row justify-content-center">
                <div class="col col-11 border mt-1" style="height: 545px;">

                    <div class="row border text-center" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px; color:white;">
                        <div class="col col-5 border" >
                            <p>Address</p>
                        </div>
                        <div class="col col-1 border">
                            <p>Fam. Count</p>
                        </div>
                        <div class="col col-2 border">
                            <p>HH. Type</p>
                        </div>
                        <div class="col col-2 border">
                            <p>Fam. Income</p>
                        </div>
                        <div class="col col-2 border">
                            <p>Action</p>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col col-12 border text-center" style="height: 470; overflow:auto;">

                            @foreach($data as $row)

                                <div class="row border mt-1" style="height: 75px; background-color:hsl(97, 43%, 41%); border-radius:10px; color:white;">
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
                                    <div class="col col-2 pt-2">
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