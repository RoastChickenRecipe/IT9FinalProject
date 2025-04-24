@extends('layouts.mainLayout')
@section('title', 'Dashboard')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-12 text-center">
                <h4 class="text-dark">Dashboard</h4>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="row mt-3 justify-content-center">
            <div class="col-11" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                <div class="row justify-content-center">
                    <div class="col-11" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
                        {{-- Header Content --}}
                        <div class="row text-center mb-3" style="background-color: #91cfb8; border-radius: 10px; color: black; padding: 10px;">
                            <h5>Content</h5>
                        </div>

                        {{--Content --}}
                        <div class="row">
                            <div class="col-12 text-center" style="height: 490px; overflow: auto;">
                                {{--Content--}}
                                <p>Diri ang content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
