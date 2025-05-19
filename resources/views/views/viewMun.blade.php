@extends('layouts.viewLayout')
@section('view-title', 'Municipality')
@section('floating')
    
    
    <div class="col col-2">

        <div class="osh-bg floating-box">
            
            <div class="osh-outline">
                <button type="button" class="btn w-100 osh-btn-add" data-bs-toggle="modal" data-bs-target="#addBrgyModal">
                    <h5>Add Brgy.</h5>
                </button>
                
            </div>

            @session('message')
                <div class="osh-outline mt-3">
                    <div class="bg-info rounded-3 p-3" style="text-align: center;"><h5>{{$value}}</h5></div>
                </div>
            @endsession

            <div class="osh-outline mt-5">
                <a href="{{route('municipality.index')}}"  class="btn w-100 osh-btn-add"><h5>Go Back</h5></a>
            </div>
            
        </div>
    </div>

@endsection

@section('view-content')
    
                    
    <div class="osh-bg">
        <div class="osh-outline row m-0">

            <div class="col col-4 text-center">
                <h4>Municipality:</h4>
                <h3 class="osh-text-ul">{{$data->mun_name}}</h3>
            </div>
            <div class="col col-2 text-center">
                <h4>Region:</h4>
                <h3 class="osh-text-ul">{{$data->region}}</h3>
            </div>
            <div class="col col-2 text-center">
                <h4>Brgy:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->groupBy('id')->Count()}}</h3>
            </div>
            <div class="col col-2 text-center">
                <h4>Subd:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-2 text-center">
                <h4>Population:</h4>
                <h3 class="osh-text-ul">{{$data->MunToHhold->flatMap->HholdToCit->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-6 align-self-center text-center">
                <button type="button"class="btn w-100 osh-btn-add" data-bs-toggle="modal" data-bs-target="#editMunModal">
                    <h5>Edit</h5>
                </button>
            </div>
            <div class="col col-6 align-self-center">

                <!-- Button trigger modal -->
                <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModalMun">
                <h5>Delete</h5>
                </button>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModalMun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalMunLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="deleteModalMunLabel"><strong>DELETE | Municiaplity/Barangay/Subdivision</strong></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{route('municipality.destroy', $data->id)}}" method="post" class="m-0">
                                @csrf
                                @method('delete')

                                <div class="modal-body text-dark">
                                    <h4>Are you sure you want to <strong>DELETE {{$data->mun_name}}</strong> municipality?</h4>
                                    <h5>Deleting a municipality will also <strong>DELETE</strong> all its barangays and subdivisions.</h5>
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

    @foreach($brgyData as $brgyRow)
        <div class="osh-bg mt-4">
            <div class="row m-0">

                {{-- Barangays --}} 
                <div class="col col-4 p-1">
                    <div class="osh-outline">

                        <div class="row m-0 ">
                            <div class="col col-12 text-center osh-bg">
                                <h4>Barangay:</h4>
                                <h3 class="osh-text-ul">{{$brgyRow->brgy_name}}</h3>
                            </div>

                            <div class="row m-0 mt-2 p-0">
                                <div class="col col-6 p-1">
                                    <a href="{{route('barangay.edit', $brgyRow->id)}}" class="btn w-100 osh-btn-add">Edit</a>
                                </div>
                                <div class="col col-6 p-1">  

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModalBrgy{{$brgyRow->id}}">
                                    Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModalBrgy{{$brgyRow->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalBrgy{{$brgyRow->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-dark" id="deleteModalBrgy{{$brgyRow->id}}Label"><strong>DELETE | Barangay/Subdivision</strong></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('barangay.destroy', $brgyRow->id)}}" method="post" class="m-0">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="modal-body text-dark">
                                                        <h4>Are you sure you want to <strong>DELETE {{$brgyRow->brgy_name}}</strong> barangay?</h4>
                                                        <h5>Deleting a barangay will also <strong>DELETE</strong> all its subdivisions.</h5>
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

                            <div class="row m-0 mt-2 p-0">
                                <div class="col col-12 p-0">
                                    <a href="{{route('subdivision.show', $brgyRow->id)}}"class="btn w-100 osh-btn-add"><h5>Add Subd.</h5></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Subdivision --}}
                <div class="col col-8 p-1">
                    <div class="osh-outline">

                        <div class="row m-0">
                            <div class="col col-12 text-center osh-bg">
                                <h4>Subdivisions:</h4>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col col-12" style="height: 500px; overflow:auto;">

                                @foreach($brgyRow->BrgyToSubd->groupBy('id') as $subdRow => $subdData)
                                <div class="osh-bg row mt-2">

                                    <div class="col col-8">
                                        <h4>{{$subdData->first()->subd_name}}</h4>
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <a href="{{route('subdivision.edit', $subdData->first()->id)}}" class="btn osh-btn-edit w-100">Edit</a>
                                    </div>
                                    <div class="col col-2 align-self-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModalSubd{{$subdData->first()->id}}">
                                        Delete
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModalSubd{{$subdData->first()->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalSubd{{$subdData->first()->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-dark" id="deleteModalSubd{{$subdData->first()->id}}Label"><strong>DELETE Subdivision</strong></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{route('subdivision.destroy', $subdData->first()->id)}}" method="post" class="m-0">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="modal-body text-dark">
                                                            <h4>Are you sure you want to <strong>DELETE {{$subdData->first()->subd_name}}</strong> subdivision?</h4>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <div class="row w-100">
                                                                <div class="col col-6">
                                                                    <button type="submit" class="btn w-100 text-white" style="background-color: #DC3545;"><h5>Delete</h5></button>
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
                    <div class="modal-body osh-md-bg">

                        <div class="row justify-content-center mt-2">
                            <div class="col col-12">
                                <div class="osh-outline">
                                    <label for="munName"><h4>Municipality:</h4></label> <br>
                                    <input type="text" name="s_munName" readonly value="{{$data->mun_name}}" class="form-control">
                                    <input type="text" name="s_mun" hidden value="{{$data->id}}">
                                </div>
                            
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col col-12">
                                <div class="osh-outline">
                                    <label for="brgyName"><h4>Barangay Name:</h4></label> <br>
                                    <input type="text" name="brgyName" class="form-control" value="{{old('brgyName')}}">
                                    @error('brgyName')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('addBrgyModal'));
                                                crDocModal.show();
                                            })
                                        </script>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-success w-100"><h5>Add Barangay</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>
                        
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
                    <h1 class="modal-title fs-5" id="editMunModalLabel">Edit Municipality</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{route('municipality.update', $data->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body osh-md-bg">

                        <div class="row justify-content-center mt-2">
                            <div class="col col-12">
                                <div class="osh-outline">
                                    <label for="munName"><h2>Municipal Name:</h2></label> <br>
                                    <input type="text" name="munName" class="form-control" value="{{$data->mun_name}}">
                                    @error('munName')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('editMunModal'));
                                                crDocModal.show();
                                            })
                                        </script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col col-12">
                                <div class="osh-outline">
                                    <label for="region"><h2>Region:</h2></label> <br>
                                    <input type="text" name="region" class="form-control" value="{{$data->region}}">
                                    @error('region')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('editMunModal'));
                                                crDocModal.show();
                                            })
                                        </script>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-success w-100"><h5>Update</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>

                    
                    </div>
                </form>


            </div>
        </div>
    </div>{{-- End Modal | Edit mun --}}

@endsection