@extends('interface.mainLayout')
@section('title', 'Documents')
@section('content')

    {{-- HEADER --}}
    <div class="row border mt-2 justify-content-center">
        <div class="col col-11" style="height: 70px; background-color:hsl(97, 43%, 41%); border-radius:10px;">
            <div class="row border align-items-center justify-content-between" style="height: 70px">
                <div class="col col-3 border ">
                    <h1 class="text-center" style="color: white">Documents</h1>
                </div>

                
                <div class="col col-3">
                    <a href="{{route('rqDocuments.create')}}" class="btn btn-dark w-100">Request</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col col-11 border justify-content-center" style="height: 590px; background-color:hsl(90, 2%, 52%); border-radius:10px;">

            <div class="row mx-1 border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                <div class="col col-2">
                    <h4>Doc. Type</h4>
                </div>
                <div class="col col-2">
                    <h4>Date Issued</h4>
                </div>
                <div class="col col-3">
                    <h4>Name</h4>
                </div>
                <div class="col col-3">
                    <h4>Issued By</h4>
                </div>
                <div class="col col-2">
                    <h4>Action</h4>
                </div>
            </div>

            <div class="row mx-1 text-white mt-2" style="height: 520px; overflow:auto;">
                <div class="col col-12 border">

                    @foreach($doc as $row)
                        
                        <div class="row border border-dark text-center text-white mt-2" style="background-color:hsl(97, 43%, 41%); border-radius: 10px;">
                            <div class="col col-2">
                                <h4>{{$row->document_type}}</h4>
                            </div>
                            <div class="col col-2">
                                <h4>{{$row->issue_date}}</h4>
                            </div>
                            <div class="col col-3">
                                <h4>{{$row->RqDocToCit->lname}}, {{$row->RqDocToCit->fname}} {{$row->RqDocToCit->mname}}</h4>
                            </div>
                            <div class="col col-3">
                                <h4>{{$row->RqDocToEmp->e_fname}}</h4>
                            </div>
                            <div class="col col-1 align-self-center">
                                <a href="" class="btn btn-success w-100">E</a>
                            </div>
                            <div class="col col-1 align-self-center">
                                <form action="" method="post" class="m-0">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">D</button>
                                </form>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>


            

        </div>
    </div>
    
@endsection