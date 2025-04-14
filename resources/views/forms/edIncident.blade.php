@extends('forms.formLayout')

@section('title', 'Edit | Incident')

@section('add-mun-content')
    
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1>Edit Incident</h1>

                    <form action="{{route('incidents.update', $data->id)}}" method="post">
                        @csrf
                        @method('put')


                        <div class="row mt-3">
                            <div class="col col-6">
                                <label for="com_name"><h4>Compliant Name:</h4></label>
                                <input type="text" name="com_name" value="{{$data->complainant_name}}" class="form-control">
                            </div>
                            <div class="col col-3">
                                <label for="incident"><h4>Incident:</h4></label>
                                <input type="text" name="incident" value="{{$data->incident_type}}" class="form-control">
                            </div>
                            <div class="col col-3">
                                <label for="rep_date"><h4>Date:</h4></label>
                                <input type="date" name="rep_date" value="{{$data->date_reported}}" class="form-control">
                            </div>
                            <div class="col col-12 mt-2">
                        
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" placeholder="hello" id="description">{{$data->description}}</textarea>
                                    <label for="description">Description</label>
                                </div>
                        
                        
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                            <div class="col col-6">
                                <a href="{{route('incidents.index')}}" class="btn btn-secondary w-100">Cancel</a>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection