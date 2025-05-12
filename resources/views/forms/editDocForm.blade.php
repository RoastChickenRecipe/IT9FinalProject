@extends('layouts.secondaryLayout')

@section('sec-title', 'Edit | Document')
@section('sec-content')


                    <h1 class="text-center osh-bg">Edit </h1>

                    <form action="{{route('rqDocuments.update', $rqDocData->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="osh-bg row justify-content-center">
                            <div class="col col-6 p-0 pe-1">
                                <div class="osh-outline">
                                    <label for="emp"><h3>Employee</h3></label>
                                    <input type="text" name="" value="{{$emp->e_fname}} {{$emp->e_lname}}" readonly class="form-control">
                                    <input type="text" name="emp" value="{{$emp->id}}" hidden>
                                </div>
                            </div>
                            <div class="col col-6 p-0 ps-1">
                                <div class="osh-outline">
                                    <label for="issue_date"><h3>Issued At:</h3></label>
                                    <input type="date" name="date" class="form-control" value="{{$rqDocData->issue_date}}">
                                    @error('date')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6 p-0 pe-1 mt-2">
                                <div class="osh-outline">
                                    <label for="sel_cit"><h3>Citizen:</h3></label>
                                    <select name="sel_cit" id="sel_cit" class="form-select">
                                        <option value="{{$rqDocData->RqDocToCit->id}}">{{$rqDocData->RqDocToCit->fname}} {{$rqDocData->RqDocToCit->mname}} {{$rqDocData->RqDocToCit->lname}}</option>
                                        @foreach($citizen as $row)
                                            <option value="{{$row->id}}">{{$row->lname}}, {{$row->fname}} {{$row->mname}}</option>
                                        @endforeach
                                    </select>
                                    @error('sel_cit')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6 p-0 ps-1 mt-2">
                                <div class="osh-outline">
                                    <label for="docType"><h3>Document Type</h3></label>
                                    <input type="text" name="docType" class="form-control" list="docTypeList" value="{{$rqDocData->document_type}}">
                                    <datalist id="docTypeList">
                                        <option value="Barangay Certificate">
                                        <option value="Barangay Clearance">
                                    </datalist>
                                    @error('docType')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-primary w-100"><h5>Update</h5></button>
                            </div>
                            <div class="col col-6">
                                <a href="{{route('rqDocuments.index')}}" class="btn w-100 text-white" style="background-color: #388E3C;"><h5>Cancel</h5></a>
                            </div>
                        </div>

                    </form>

    
@endsection
