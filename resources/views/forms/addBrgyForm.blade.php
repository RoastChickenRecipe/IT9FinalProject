@extends('layouts.addressLayout')
@section('title' , 'Add | Barangay')
@section('add-content')

    <h1>Add Barangay</h1>

    <form action="{{route('barangay.store')}}" method="post">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class="col col-6">
                <label for="munName">Municipality</label> <br>
                <select name="s_mun" id="s_mun" class="form-select">

                    <option value="">None</option>
                    @foreach($municipality as $row)
                        <option value="{{$row['id']}}">{{$row['mun_name']}}</option>
                    @endforeach

                </select>
                @error('s_mun')
                    <h5 style="color: red;">{{$message}}</h5>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col col-6">
                <label for="brgyName">Barangay</label> <br>
                <input type="text" name="brgyName" class="form-control" value="{{old('brgyName')}}">
                @error('brgyName')
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