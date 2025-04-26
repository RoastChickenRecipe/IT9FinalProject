@extends('layouts.addressLayout')
@section('title', 'Add | Municipality')

@section('add-content')

    <h1>Add Municipality</h1>
    <form action="{{route('municipality.store')}}" method="post">
        @csrf

        {{-- For Input Form --}}
        <div class="row justify-content-center mt-5">
            <div class="col col-6">
                <label for="munName"><h4>Municipal Name:</h4></label> <br>
                <input type="text" name="munName" class="form-control" value="{{old('munName')}}">
                @error('munName')
                    <h5 style="color: red">{{$message}}</h5>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-6">
                <label for="region"><h4>Region:</h4></label> <br>
                <input type="text" name="region" class="form-control" value="{{old('region')}}">
                @error('region')
                    <h5 style="color: red">{{$message}}</h5>
                @enderror
            </div>
        </div>

        {{-- For Button --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100">Add</button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.index')}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>

                    
@endsection