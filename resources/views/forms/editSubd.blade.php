@extends('layouts.secondaryLayout')
@section('sec-title', 'Edit | Subdivision')
@section('sec-content')
    
    <h1 class="osh-bg text-center">Edit Subdivision</h1>

    <form action="{{route('subdivision.update', $subdData->id)}}" method="post" class="m-0">
        @csrf
        @method('put')
        <div class="row justify-content-center mt-3">
        
            <div class="col col-12">
                <div class="osh-bg">
                    <label for="s_brgy"><h4>Barangay</h4></label> <br>
                    <input type="text" name="s_brgyName" readonly value="{{$brgyData->brgy_name}}" class="form-control">
                    <input type="text" name="s_brgy" hidden value="{{$brgyData->id}}">
                </div>
            </div>
          
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-12">
                <div class="osh-bg">
                    <label for="subdName"><h4>Subdivision</h4></label> <br>
                    <input type="text" name="subdName" class="form-control" value="{{$subdData->subd_name}}">
                    @error('subdName')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100"><h5>Update</h5></button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $brgyData->municipality_id)}}" class="btn w-100 osh-btn-cancel"><h5>Cancel</h5></a>
            </div>
        </div>
    </form>
    
@endsection