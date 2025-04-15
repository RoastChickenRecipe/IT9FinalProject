@extends('layouts.viewLayout')
@section('view-title', 'Municipality')

@section('view-content')
    
                    
    <div class="osh-bg mb-5">
        <div class="osh-outline row text-center m-0">

            <div class="col col-4">
                <h4>Municipality:</h4>
                <h3 class="osh-text-ul">{{$data->mun_name}}</h3>
            </div>
            <div class="col col-2">
                <h4>Brgy:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->groupBy('id')->Count()}}</h3>
            </div>
            <div class="col col-2">
                <h4>Subd:</h4>
                <h3 class="osh-text-ul">{{$data->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-2">
                <h4>Popultion:</h4>
                <h3 class="osh-text-ul">{{$data->MunToHhold->flatMap->HholdToCit->groupBy('id')->count()}}</h3>
            </div>
            <div class="col col-1 align-self-center">
                <a href="" class="btn btn-dark w-100">Edit</a>
            </div>
            <div class="col col-1 align-self-center">
                <form action="" method="post" class="m-0">
                    @csrf
                    @method('destroy')
                    <button type="submit" class="btn btn-danger w-100">Del</button>
                </form>
            </div>

        </div>
    </div>

@endsection