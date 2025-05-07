@extends('layouts.viewLayout')
@section('view-title', 'Municipality')
@section('floating')
    
    
        <div class="col col-2">

            <div class="osh-bg floating-box">
                <div class="osh-outline row m-0">
                    <div class="col col-12">
                        <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#addBrgyModal">
                            <h5>Add Brgy.</h5>
                        </button>
                    </div>

                    <div class="col col-12 mt-5">
                        <a href="{{route('municipality.index')}}" class="btn btn-dark w-100"><h5>Go Back</h5></a>
                    </div>
                </div>
            </div>

        </div>
    

@endsection

@section('view-content')
    
                    
    <div class="osh-bg">
        <div class="osh-outline row text-center m-0">

            <div class="col col-4">
                <h4>Municipality:</h4>
                <h3 class="osh-text-ul">{{$data->mun_name}}</h3>
            </div>
            <div class="col col-2">
                <h4>Region:</h4>
                <h3 class="osh-text-ul">{{$data->region}}</h3>
            </div>
            <div class="col col-2">
                <h4>Brgy:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->groupBy('id')->Count()}}</h3>
            </div>
            <div class="col col-2">
                <h4>Subd:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-2">
                <h4>Population:</h4>
                <h3 class="osh-text-ul">{{$data->MunToHhold->flatMap->HholdToCit->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-6 align-self-center">
                <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#editMunModal">
                    <h5>Edit</h5>
                </button>
            </div>
            <div class="col col-6 align-self-center">
                <form action="{{route('municipality.destroy', $data->id)}}" method="post" class="m-0">
                    @csrf
                    @method('delete')
                        <button type="submit" class="btn btn-danger w-100"><h5>Delete</h5></button>
                </form>
            </div>

            @session('message')
                <div class="bg-info rounded-3 mt-2 p-2" style="text-align: center;"><h5>{{$value}}</h5></div>
            @endsession

        </div>
    </div>

    @foreach($brgyData as $brgyRow)
        <div class="osh-bg mt-4">
            <div class="row m-0">

                {{-- Barangays --}}
                
                <div class="col col-4 p-1">
                    <div class="osh-outline">

                        <div class="row m-0 ">
                            <div class="col col-12 text-center">
                                <h4>Barangay:</h4>
                            </div>

                            <div class="osh-outline-sec row m-0">

                                <div class="col col-12 text-center">
                                    <h5>{{$brgyRow->brgy_name}}</h5>
                                </div>
                            </div>

                            <div class="row m-0 mt-3 p-0">
                                <div class="col col-6 p-1">
                                    <a href="{{route('barangay.edit', $brgyRow->id)}}" class="btn btn-dark w-100">Edit</a>
                                </div>
                                <div class="col col-6 p-1">
                                    <form action="{{route('barangay.destroy', $brgyRow->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                                    </form>
                                </div>
                            </div>

                            <div class="row m-0 mt-3 p-0">
                                <div class="col col-12 p-0">
                                    <a href="{{route('subdivision.show', $brgyRow->id)}}" class="btn btn-dark w-100"><h5>Add Subd.</h5></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Subdivision --}}
                <div class="col col-8 p-1">
                    <div class="osh-outline">

                        <div class="row m-0">
                            <div class="col col-12 text-center">
                                <h4>Subdivisions:</h4>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col col-12" style="height: 500px; overflow:auto;">

                                @foreach($brgyRow->BrgyToSubd->groupBy('id') as $subdRow => $subdData)
                                <div class="osh-outline-sec row mt-2">

                                    <div class="col col-8">
                                        <h4>{{$subdData->first()->subd_name}}</h4>
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <a href="{{route('subdivision.edit', $subdData->first()->id)}}" class="btn btn-success w-100">Edit</a>
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <form action="{{route('subdivision.destroy', $subdData->first()->id)}}" method="post" class="m-0">
                                            @csrf
                                            @method('delete')
                                                <button type="submit" class="btn btn-danger w-100">Delete</button>
                                        </form>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    
    {{-- Modal | Add brgy --}}
    <div class="modal fade" id="addBrgyModal" tabindex="-1" aria-labelledby="addBrgyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addBrgyModalLabel">Add Barangay</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{route('barangay.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row justify-content-center mt-5">
                            <div class="col col-10">
                                <label for="munName"><h2>Municipality</h2></label> <br>
                                <input type="text" name="s_munName" readonly value="{{$data->mun_name}}" class="form-control">
                                <input type="text" name="s_mun" hidden value="{{$data->id}}">
                            
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col col-10">
                                <label for="brgyName"><h2>Barangay Name:</h2></label> <br>
                                <input type="text" name="brgyName" class="form-control" value="{{old('brgyName')}}">
                                @error('brgyName')
                                    <h5 style="color: red;">{{$message}}</h5>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Add Barangay</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                </form>


            </div>
        </div>
    </div>{{-- End Modal | Add brgy --}}

    {{-- Modal | Edit mun --}}
    <div class="modal fade" id="editMunModal" tabindex="-1" aria-labelledby="editMunModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editMunModalLabel">Add Barangay</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{route('municipality.update', $data->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">

                        <div class="row justify-content-center mt-5">
                            <div class="col col-10">
                                <label for="munName"><h2>Municipal Name:</h2></label> <br>
                                <input type="text" name="munName" class="form-control" value="{{$data->mun_name}}">
                                @error('munName')
                                    <h5 style="color: red">{{$message}}</h5>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col col-10">
                                <label for="region"><h2>Region:</h2></label> <br>
                                <input type="text" name="region" class="form-control" value="{{$data->region}}">
                                @error('region')
                                    <h5 style="color: red">{{$message}}</h5>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                </form>


            </div>
        </div>
    </div>{{-- End Modal | Edit mun --}}

@endsection