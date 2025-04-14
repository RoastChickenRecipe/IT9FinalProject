@extends('layouts.mainLayout')
@section('title', 'Address')

@section('content')
    
    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="osh-outline col col-11" style="height: 70px;">
            <div class="row align-items-center " style="height: 70px">
                <div class="col col-3">
                    <h1>Address</h1>
                </div>

                <div class="col col-3">
                </div>  

                <div class="col col-2">
                    <a href="{{route('municipality.create')}}" class="btn btn-dark w-100">Add Mun.</a>
                </div>
                <div class="col col-2">
                    <a href="{{route('barangay.create')}}" class="btn btn-dark w-100">Add Brgy.</a>
                </div>
                <div class="col col-2">
                    <a href="{{route('subdivision.create')}}" class="btn btn-dark w-100">Add Subd.</a>
                </div>
            </div>
        </div>
    </div>
    {{-- CONTENT --}}

    <div class="row mt-3 justify-content-center">
        <div class="osh-bg col col-11 justify-content-center p-1" style="height: 570px;">
            <div class="row justify-content-center">
                <div class="col col-11 mt-1" style="height: 545px;">

                    <div class="osh-outline row text-center" style="height: 50px;">
                        <div class="col col-3 pt-2" >
                            <h4>Municipality</h4>
                        </div>
                        <div class="col col-1 pt-2">
                            <h4>Region</h4>
                        </div>
                        <div class="col col-2 pt-2">
                            <h4>Total Brgy.</h4>
                        </div>
                        <div class="col col-2 pt-2">
                            <h4>Total Subd.</h4>
                        </div>
                        <div class="col col-2 pt-2">
                            <h4>Population</h4>
                        </div>
                        <div class="col col-2 pt-2">
                            <h4>Action</h4>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col col-12 text-center" style="height: 490px; overflow:auto;">

                            @foreach($data as $row)
                                <div class="osh-outline row mt-1" style="height: 50px;">

                                    <div class="col col-3 pt-2">
                                        <h4>{{ $row->mun_name }}</h4>
                                    </div>
                                    <div class="col col-1 pt-2">
                                        <h4>{{ $row->region }}</h4>
                                    </div>
                                    <div class="col col-2 pt-2">   
                                        <h4>{{$row->MunToBrgy->groupBy('id')->Count()}}</h4>    
                                    </div>
                                    <div class="col col-2 pt-2">   
                                        <h4>{{$row->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count()}}</h4>    
                                    </div>
                                    <div class="col col-2 pt-2">   
                                        <h4>{{$row->MunToHhold->flatMap->HholdToCit->groupBy('id')->count()}}</h4>    
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <a href="" class="btn btn-light"><i class="bi bi-view-list"></i>View</a>
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
