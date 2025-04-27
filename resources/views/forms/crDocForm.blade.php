@extends('forms.formLayout')

@section('title', 'Request Form')
@section('add-mun-content')

    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1>Request</h1>

                    <form action="{{route('rqDocuments.store')}}" method="post">
                        @csrf
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
                                <input type="text" name="docType" class="form-control" value="{{old('docType')}}">
                                @error('docType')
                                    <div>
                                        <h5 class="text-danger">{{$message}}</h5>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                            <div class="col col-6">
                                <a href="{{route('rqDocuments.index')}}" class="btn btn-secondary w-100">Cancel</a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    
@endsection
