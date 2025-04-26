@extends('layouts.mainLayout')
@section('title', 'Address')
@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #d9f2e6; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #b3e6cc; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Address</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('municipality.create') }}" class="btn w-100" style="background-color:rgb(65, 219, 90); color: black; border-radius: 10px;">Add Municipality</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #91cfb8; margin: 0;">

        {{-- SEARCH BAR --}}
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" class="form-control" placeholder="Search" style="border-radius: 0; border: none;">
                    <button class="btn" style="background-color: #b3e6cc; color: black; border: none;">X</button>
                </div>
               
            </div>
        </div>

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12">
                <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color:rgb(47, 218, 132); color: black;">
                            <tr>
                                <th>Municipality</th>
                                <th>Region</th>
                                <th>Total Brgy</th>
                                <th>Total Subd</th>
                                <th>Population</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->mun_name }}</td>
                                    <td>{{ $row->region }}</td>
                                    <td>{{ $row->MunToBrgy->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToHhold->flatMap->HholdToCit->groupBy('id')->count() }}</td>
                                    <td>
                                        <a href="{{ route('municipality.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--
            <div class="row mt-1">
                <div class="col col-12 text-center" style="height: 490px; overflow:auto;">

                    @foreach($data as $row)
                        <div class="osh-outline row m-0 mt-1" style="height: 50px;">

                            <div class="col col-3 pt-2">
                                <h4>{{ $row->mun_name }}</h4>
                            </div>
                            <div class="col col-1 pt-2">
                                <h4>{{ $row->region }}</h4>
                            </div>
                            <div class="col col-2 pt-2">   
                                <h4>{{$row->MunToBrgy->groupBy('id')->Count()}}</h4>    
                            </div>
                            <div class="col col-2 pt-2">   
                                <h4>{{$row->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count()}}</h4>    
                            </div>
                            <div class="col col-2 pt-2">   
                                <h4>{{$row->MunToHhold->flatMap->HholdToCit->groupBy('id')->count()}}</h4>    
                            </div>
                            <div class="col col-2 align-self-center">
                                <a href="{{route('municipality.show', $row->id)}}" class="btn btn-light"><i class="bi bi-view-list"></i>View</a>
                            </div>

                        </div>
                    @endforeach

                </div>    
            </div>--}}
         
        </div>
    </div>

@endsection
