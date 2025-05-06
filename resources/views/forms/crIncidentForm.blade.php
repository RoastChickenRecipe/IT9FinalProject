@extends('layouts.addressLayout')

@section('title', 'Form | File Incident')

@section('add-content')
    
    <h1>File an Incident</h1>

    <form action="" method="post">
        @csrf

        <div class="row mt-3">

            <div class="col col-6 mt-3">
                <label for="name"><h4>Name:</h4></label>
                <input type="text" name="name" readonly value="{{$data->com_fname}} {{$data->com_lname}}" class="form-control">
                <input type="text" name="compl_id" hidden value="{{$data->id}}">

            </div>
            <div class="col col-3 mt-3">
                <label for="incident"><h4>Incident:</h4></label>
                <input type="text" name="incident" value="{{old('incident')}}" class="form-control">
            </div>
            <div class="col col-3 mt-3">
                <label for="rep_date"><h4>Date:</h4></label>
                <input type="date" name="rep_date" value="{{old('rep_date')}}" class="form-control">
            </div>

            <div class="col col-12 mt-3">
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="hello" id="description">{{old('description')}}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>
        </div>

        {{-- For Buttons --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
            <div class="col col-6">
                <a href="{{route('complainants.show', $data->id)}}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>

    </form>

@endsection