@extends('layouts.mainLayout')
@section('title', 'Documents')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Documents</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('rqDocuments.create') }}" class="btn w-100" style="background-color:rgb(1, 110, 34); color: white; border-radius: 10px;">Create a Request</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12" style="overflow: auto;">
                <div class="table-responsive" style="background-color: #E8F5E9; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #4CAF50; color: white;">
                            <tr>
                                <th>Doc. Type</th>
                                <th>Date Issued</th>
                                <th>Name</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doc as $row)
                                <tr>
                                    <td>{{ $row->document_type }}</td>
                                    <td>{{ $row->issue_date }}</td>
                                    <td>{{ $row->RqDocToCit->lname }}, {{ $row->RqDocToCit->fname }} {{ $row->RqDocToCit->mname }}</td>
                                    <td>{{ $row->RqDocToEmp->e_fname }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="" class="btn btn-primary btn-sm" style="background-color:rgb(34, 62, 219); color: white; border-radius: 5px;">Edit</a>
                                            <form action="" method="post" class="m-0">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: #DC3545; color: white; border-radius: 5px;">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection