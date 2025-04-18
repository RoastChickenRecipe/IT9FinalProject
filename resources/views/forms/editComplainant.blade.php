@extends('layouts.secondaryLayout')

@section('sec-title', 'Request Form')

@section('sec-content')
    
    <h1>Edit {{$editCompl->com_fname}}</h1>

    <form action="{{route('complainants.update', $editCompl->id)}}" method="post">
        @csrf
        @method('put')

        <div class="row mt-3">

            <div class="col col-6">
                <label for="com_fname"><h4>First Name:</h4></label>
                <input type="text" name="com_fname" value="{{$editCompl->com_fname}}" class="form-control">
                @error('com_fname')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-6">
                <label for="com_lname"><h4>Last Name:</h4></label>
                <input type="text" name="com_lname" value="{{$editCompl->com_lname}}" class="form-control">
                @error('com_lname')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col col-7 mt-3">
                <label for="address"><h4>Address:</h4></label>
                <input type="text" name="address" value="{{$editCompl->com_address}}" class="form-control">
                @error('address')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-5 mt-3">
                <label for="com_conNum"><h4>Contact Number:</h4></label>
                <input type="text" name="com_conNum" value="{{$editCompl->com_contactNum}}" class="form-control">
                @error('com_conNum')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

        </div>

        {{-- For Buttons --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
            <div class="col col-6">
                <a href="{{route('complainants.show', $editCompl->id)}}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>

    </form>

@endsection