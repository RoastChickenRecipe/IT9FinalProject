@extends('layouts.mainLayout')
@section('title', 'Documents')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Documents</h4>
            </div>
            <div class="col-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn w-100" style="background-color:rgb(1, 110, 34); color: white; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#reqDoc">
                Request Document
                </button>

            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12" style="overflow: auto;">
                <div class="table-responsive" style="background-color: #E8F5E9; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #4CAF50; color: white;">
                            <tr>
                                <th>Doc. Type</th>
                                <th>Date Issued</th>
                                <th>Name</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doc as $row)
                                <tr>
                                    <td>{{ $row->document_type }}</td>
                                    <td>{{ $row->issue_date }}</td>
                                    <td>{{ $row->RqDocToCit->lname }}, {{ $row->RqDocToCit->fname }} {{ $row->RqDocToCit->mname }}</td>
                                    <td>{{ $row->RqDocToEmp->e_fname }} {{ $row->RqDocToEmp->e_lname }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('rqDocuments.edit', $row->id)}}" class="btn btn-primary btn-sm" style="background-color:rgb(34, 62, 219); color: white; border-radius: 5px;">Edit</a>
                                            

                                            <form action="{{route('rqDocuments.destroy', $row->id)}}" method="post" class="m-0">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: #DC3545; color: white; border-radius: 5px;">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Request Doc Modal -->
    <div class="modal modal-lg fade" id="reqDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reqDocLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reqDocLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('rqDocuments.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col col-6">
                                <label for="emp"><h3>Employee</h3></label>
                                <input type="text" name="" value="{{$emp->e_fname}} {{$emp->e_lname}}" readonly class="form-control">
                                <input type="text" name="emp" value="{{$emp->id}}" hidden>
                            </div>
                            <div class="col col-6">
                                <label for="issue_date"><h3>Issued At:</h3></label>
                                <input type="date" name="date" class="form-control" value="{{old('date')}}">
                                @error('date')
                                    <div>
                                        <h5 class="text-danger">{{$message}}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="col col-6">
                                <label for="sel_cit"><h3>Citizen:</h3></label>
                                <select name="sel_cit" id="sel_cit" class="form-select">
                                    <option value="">None</option>
                                    @foreach($citizen as $row)
                                        <option value="{{$row->id}}">{{$row->lname}}, {{$row->fname}} {{$row->mname}}</option>
                                    @endforeach
                                </select>
                                @error('sel_cit')
                                    <div>
                                        <h5 class="text-danger">{{$message}}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="col col-6">
                                <label for="docType"><h3>Document Type</h3></label>
                                <input type="text" name="docType" class="form-control" list="docTypeList" value="{{old('docType')}}">
                                <datalist id="docTypeList">
                                    <option value="Barangay Certificate">
                                    <option value="Barangay Clearance">
                                </datalist>
                                @error('docType')
                                    <div>
                                        <h5 class="text-danger">{{$message}}</h5>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col col-6">
                                
                            </div>
        
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><h5>Submit</h5></button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><h5>Close</h5></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div><!-- End Request Doc Modal -->

    @if($errors->any())

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var crDocModal = new bootstrap.Modal(document.getElementById('reqDoc'));
                crDocModal.show();
            })
        </script>
        
    @endif

@endsection