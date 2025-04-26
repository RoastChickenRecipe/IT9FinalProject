@extends('layouts.addressLayout')
@section('title', 'Add | Municipality')

@section('add-content')

    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-12 text-center">
                <h4 class="text-dark">Add Municipality</h4>
            </div>
        </div>

        {{-- FORM --}}
        <div class="row justify-content-center">
            <div class="col-10" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
                <form action="{{ route('municipality.store') }}" method="post">
                    @csrf

                    {{-- Municipal Name Input --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="munName" class="form-label"><strong>Municipal Name</strong></label>
                            <input type="text" name="munName" class="form-control" value="{{ old('munName') }}">
                            @error('munName')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Region Input --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="region" class="form-label"><strong>Region</strong></label>
                            <input type="text" name="region" class="form-control" value="{{ old('region') }}">
                            @error('region')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

        {{-- For Button --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-success w-100">Add</button>
            </div>

            <div class="col col-6">
                <a href="{{route('view.address')}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </div>

@endsection