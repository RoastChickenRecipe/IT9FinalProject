@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Barangay')
    
@section('sec-content')
    
    <form action="{{route('barangay.update', $brgyData->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row justify-content-center mt-5">
            <div class="col col-6">
                <label for="munName">Municipality</label> <br>
                <input type="text" name="s_munName" class="form-control" value="{{$munData->mun_name}}">
                <input type="text" name="s_mun" hidden value="{{$munData->id}}">
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-6">
                <label for="brgyName">Barangay</label> <br>
                <input type="text" name="brgyName" class="form-control" value="{{$brgyData->brgy_name}}">
                @error('brgyName')
                    <h5 style="color: red;">{{$message}}</h5>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Update</button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $munData->id)}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>

@endsection