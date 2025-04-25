@extends('layouts.addressLayout')
@section('title', 'Add | Subdivision')

@section('add-content')

    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-12 text-center">
                <h4 class="text-dark">Add Subdivision</h4>
            </div>
        </div>

        {{-- FORM --}}
        <div class="row justify-content-center">
            <div class="col-10" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
                <form action="{{ route('subdivision.store') }}" method="post">
                    @csrf

                    {{-- Barangay Name (Read-Only) --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="s_brgy" class="form-label"><strong>Barangay</strong></label>
                            <input type="text" name="s_brgyName" readonly value="{{ $brgyData->brgy_name }}" class="form-control">
                            <input type="text" name="s_brgy" hidden value="{{ $brgyData->id }}">
                        </div>
                    </div>

                    {{-- Subdivision Name Input --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="subdName" class="form-label"><strong>Subdivision Name</strong></label>
                            <input type="text" name="subdName" class="form-control" value="{{ old('subdName') }}">
                            @error('subdName')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100">Add</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('municipality.show', $brgyData->municipality_id) }}" class="btn btn-dark w-100">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection