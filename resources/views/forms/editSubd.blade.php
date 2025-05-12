@extends('layouts.addressLayout')
@section('title', 'Edit | Subdivision')
@section('add-content')
    
    <h1 class="osh-bg text-center">Edit Subdivision</h1>

    <form action="{{route('subdivision.update', $subdData->id)}}" method="post" class="m-0">
        @csrf
        @method('put')
        <div class="row justify-content-center mt-5">
        
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="s_brgy">Barangay</label> <br>
                    <input type="text" name="s_brgyName" readonly value="{{$brgyData->brgy_name}}" class="form-control">
                    <input type="text" name="s_brgy" hidden value="{{$brgyData->id}}">
                </div>
            </div>
          
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="subdName">Subdivision</label> <br>
                    <input type="text" name="subdName" class="form-control" value="{{$subdData->subd_name}}">
                    @error('subdName')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Update</button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $brgyData->municipality_id)}}" class="btn w-100 text-white" style="background-color: #388E3C;">Cancel</a>
            </div>
        </div>
    </form>
    
@endsection