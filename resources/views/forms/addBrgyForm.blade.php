@extends('layouts.addressLayout')
@section('title', 'Add | Barangay')

@section('add-content')

    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-12 text-center">
                <h4 class="text-dark">Add Barangay</h4>
            </div>
        </div>

        {{-- FORM --}}
        <div class="row justify-content-center">
            <div class="col-10" style="background-color:rgb(255, 255, 255); border-radius: 10px; padding: 20px;">
                <form action="{{ route('barangay.store') }}" method="post">
                    @csrf

                    {{-- Municipality Dropdown --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="s_mun" class="form-label"><strong>Municipality</strong></label>
                            <select name="s_mun" id="s_mun" class="form-select">
                                <option value="">None</option>
                                @foreach($municipality as $row)
                                    <option value="{{ $row['id'] }}">{{ $row['mun_name'] }}</option>
                                @endforeach
                            </select>
                            @error('s_mun')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Barangay Name Input --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="brgyName" class="form-label"><strong>Barangay Name</strong></label>
                            <input type="text" name="brgyName" class="form-control" value="{{ old('brgyName') }}">
                            @error('brgyName')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" style="background-color:rgb(22, 105, 230);" class=" btn btn-success w-100">Add</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('view.address') }}" class="btn btn-dark w-100">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection