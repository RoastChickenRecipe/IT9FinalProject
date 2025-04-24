@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Subdivision')
    
@section('sec-content')

    <form action="{{route('subdivision.update', $subdData->id)}}" method="post" class="m-0">
        @csrf
        @method('put')
        <div class="row justify-content-center mt-5">
            <div class="col col-6">
                <label for="s_brgy">Barangay</label> <br>
                <input type="text" name="s_brgyName" readonly value="{{$brgyData->brgy_name}}" class="form-control">
                <input type="text" name="s_brgy" hidden value="{{$brgyData->id}}">
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-6">
                <label for="subdName">Subdivision</label> <br>
                <input type="text" name="subdName" class="form-control" value="{{$subdData->subd_name}}">
                @error('subdName')
                    <h5 style="color: red;">{{$message}}</h5>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Update</button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $brgyData->municipality_id)}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>
    
@endsection