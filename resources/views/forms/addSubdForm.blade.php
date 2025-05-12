@extends('layouts.addressLayout')
@section('title', 'Add | Subdivision')
@section('add-content')
    
    <h1 class="osh-bg text-center">Add Subdivision</h1>

    <form action="{{route('subdivision.store')}}" method="post">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="s_brgy"><h4>Barangay</h4></label> <br>
                    <input type="text" name="s_brgyName" readonly value="{{$brgyData->brgy_name}}" class="form-control">
                    <input type="text" name="s_brgy" hidden value="{{$brgyData->id}}">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="subdName"><h4>Subdivision</h4></label> <br>
                    <input type="text" name="subdName" class="form-control" value="{{old('subdName')}}">
                    @error('subdName')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100">Add</button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $brgyData->municipality_id)}}" class="btn w-100 text-white" style="background-color: #388E3C;">Cancel</a>
            </div>
        </div>
    </form>

                    

@endsection