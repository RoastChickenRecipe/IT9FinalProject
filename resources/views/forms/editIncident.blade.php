@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Incident')
@section('sec-content')
    
    <form action="{{route('incidents.update', $data->id)}}" method="post">
        @csrf
        @method('put')
        <h1>Edit Incident</h1>
        <div class="row mt-3">

            <div class="col col-6 mt-3">
                <label for="incident"><h4>Incident:</h4></label>
                <input type="text" name="incident" value="{{$data->incident_type}}" class="form-control">
            </div>
            <div class="col col-6 mt-3">
                <label for="rep_date"><h4>Date:</h4></label>
                <input type="date" name="rep_date" value="{{$data->date_reported}}" class="form-control">
            </div>

            <div class="col col-12 mt-3">
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="hello" id="description">{{$data->description}}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>
            
                <div class="row justify-content-center mt-2">
                    <div class="col col-8">
                        <h6 class="text-success text-center">{{session()->pull('success')}}</h6>
                    </div>
                </div>
            
        </div>

        {{-- For Buttons --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
            <div class="col col-6">
                <a href="{{route('complainants.show', $data->complainant_id)}}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>




    </form>

@endsection