@extends('layouts.addressLayout')
@section('title', 'Add | Subdivision')
@section('add-content')
    
    <h1>Add Subdivision</h1>

    <form action="{{route('subdivision.store')}}" method="post">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class="col col-6">
                <label for="s_brgy">Barangay</label> <br>
                <select name="s_brgy" id="s_brgy" class="form-select">

                    <option value="">None</option>
                    @foreach($barangay as $row)
                        <option value="{{$row['id']}}">{{$row['brgy_name']}}</option>
                    @endforeach

                </select>
                @error('s_brgy')
                    <h5 style="color: red;">{{$message}}</h5>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-6">
                <label for="subdName">Subdivision</label> <br>
                <input type="text" name="subdName" class="form-control" value="{{old('subdName')}}">
                @error('subdName')
                    <h5 style="color: red;">{{$message}}</h5>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100">Add</button>
            </div>

            <div class="col col-6">
                <a href="{{route('view.address')}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>

                    

@endsection