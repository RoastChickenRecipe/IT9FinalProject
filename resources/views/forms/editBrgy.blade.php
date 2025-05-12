@extends('layouts.addressLayout')
@section('title', 'Edit | Barangay')
@section('add-content')

    <h1 class="osh-bg text-center">Edit Barangay</h1>
    
    <form action="{{route('barangay.update', $brgyData->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row justify-content-center mt-5">
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="munName"><h4>Municipality</h4></label> <br>
                    <input type="text" name="s_munName" class="form-control" value="{{$munData->mun_name}}">
                    <input type="text" name="s_mun" hidden value="{{$munData->id}}">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-8">
                <div class="osh-bg">
                    <label for="brgyName"><h4>Barangay</h4></label> <br>
                    <input type="text" name="brgyName" class="form-control" value="{{$brgyData->brgy_name}}">
                    @error('brgyName')
                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100"><h5>Update</h5></button>
            </div>

            <div class="col col-6">
                <a href="{{route('municipality.show', $munData->id)}}" class="btn w-100 text-white" style="background-color: #388E3C;"><h5>Cancel</h5></a>
            </div>
        </div>
    </form>

@endsection