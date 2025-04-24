@extends('layouts.mainLayout')
@section('title', 'Address')
@section('content')
    
    {{-- HEADER --}}
    <div class="row mt-2 justify-content-center">
        <div class="osh-outline col col-11" style="height: 70px;">

            <div class="row align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3">
                    <h1>Address</h1>
                </div>


                <div class="col col-2">
                    <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#addMunModal">
                        Add Mun.
                    </button>
                </div>
               
            </div>
        </div>
    </div>
    {{-- CONTENT --}}


    <div class="row mt-3 justify-content-center">
        <div class="osh-bg col col-11 justify-content-center p-1" style="height: 590px;">

            <div class="osh-outline row m-0 mt-2 text-center" style="height: 50px;">
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
                        <div class="osh-outline row m-0 mt-1" style="height: 50px;">

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
                                <a href="{{route('municipality.show', $row->id)}}" class="btn btn-light"><i class="bi bi-view-list"></i>View</a>
                            </div>

                        </div>
                    @endforeach

                </div>    
            </div>
         
        </div>
    </div>


    {{-- Modal | Edit mun --}}
    <div class="modal fade" id="addMunModal" tabindex="-1" aria-labelledby="addMunModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMunModalLabel">Add Municipality</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{route('municipality.store')}}" method="post">
                    @csrf
                    
                    <div class="modal-body">

                        <div class="row justify-content-center mt-5">
                            <div class="col col-10">
                                <label for="munName"><h4>Municipal Name:</h4></label> <br>
                                <input type="text" name="munName" class="form-control" value="{{old('munName')}}">
                                @error('munName')
                                    <h5 style="color: red">{{$message}}</h5>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col col-10">
                                <label for="region"><h4>Region:</h4></label> <br>
                                <input type="text" name="region" class="form-control" value="{{old('region')}}">
                                @error('region')
                                    <h5 style="color: red">{{$message}}</h5>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Add Municipality</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                </form>


            </div>
        </div>
    </div>{{-- End Modal | Add mun --}}

@endsection
