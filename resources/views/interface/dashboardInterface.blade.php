@extends('interface.mainLayout')
@section('title', 'Dashboard')
@section('content')
    
    {{-- HEADER --}}
    <div class="row border mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">

            <div class="row border align-items-center" style="height: 70px">
                <div class="col col-3 border ">
                    <h1 class="text-center" style="color: white">Dashboard</h1>
                </div>

                
            </div>
        </div>
    </div>
    {{-- CONTENT --}}

    <div class="row mt-3 justify-content-center">
        <div class="col col-11 border justify-content-center p-1" style="height: 570px; background-color:hsl(90, 2%, 52%); border-radius:10px;">
            <div class="row justify-content-center">
                <div class="col col-11 border mt-1" style="height: 545px;">

                    <div class="row border text-center" style="height: 50px; background-color:hsl(97, 43%, 41%); border-radius:10px; color:white;">
                        {{-- Header for Sub Content Here --}}
                    </div>

                    <div class="row mt-1">
                        <div class="col col-12 border text-center" style="height: 490px; overflow:auto;">
                            {{-- Sub Content Here --}}



                        </div>    
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection
