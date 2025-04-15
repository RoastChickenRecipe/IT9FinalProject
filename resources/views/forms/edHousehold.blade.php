@extends('layouts.secondaryLayout')
@section('sec-title', 'Household | Edit')
@section('sec-content')
    
    <form action="{{route('households.update', $data->id)}}" method="post" class="m-0">
        @csrf
        @method('put')

        <div class="row justify-content-center">

            <div class="col col-6">
                <label for="householdType"><h4>Household Type:</h4></label>
                <input type="text" name="householdType" class="form-control" value="{{$data->household_type}}">
                @error('householdType')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col col-6">
                <label for="s_mun"><h4>Municipality:</h4></label>
                <select name="s_mun" id="s_mun" class="form-select">
                    <option value="{{$data->municipality_id}}">{{$data->HholdToMun->mun_name}}</option>
                    @foreach($mun as $munRow)
                        <option value="{{$munRow->id}}">{{$munRow->mun_name}}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="col col-6">
                <label for="s_brgy"><h4>Barangay:</h4></label>
                <select name="s_brgy" id="s_brgy" class="form-select">
                    <option value="{{$data->barangay_id}}">{{$data->HholdToBrgy->brgy_name}}</option>
                    @foreach($brgy as $brgyRow)
                        <option value="{{$brgyRow->id}}">{{$brgyRow->brgy_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-6">
                <label for="s_subd"><h4>Subdivision:</h4></label>
                <select name="s_subd" id="s_subd" class="form-select">
                    <option value="{{$data->subdivision_id}}">{{$data->HholdToSubd->subd_name}}</option>
                    @foreach($subd as $subdRow)
                        <option value="{{$subdRow->id}}">{{$subdRow->subd_name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Update</button>
            </div>
            <div class="col col-6">
                <a href="{{route('households.show', $data->id)}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>

    </form>

@endsection