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
                <!-- Button trigger modal -->
                <button type="button" class="btn w-100 osh-btn-primary" data-bs-toggle="modal" data-bs-target="#reqDoc">
                Request Document
                </button>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- SEARCH BAR AND SORTING --}}
        <div class="row mt-3 mb-3">
            <div class="col-md-9 col-sm-8">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Document Type" style="border-radius: 0; border: none;">
                    <button class="btn" id="clearSearch" style="background-color: #b3e6cc; color: black; border: none;">Cancel</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:rgb(0, 76, 241); color: white; border-radius: 10px;">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item sort-option" data-column="0" href="#">Document Type</a></li>
                        <li><a class="dropdown-item sort-option" data-column="1" href="#">Date Issued</a></li>
                        <li><a class="dropdown-item sort-option" data-column="2" href="#">Name</a></li>
                        <li><a class="dropdown-item sort-option" data-column="3" href="#">Issued By</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12" style="overflow: auto;">
                <div class="table-responsive" style="background-color: #E8F5E9; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered">
                        <thead style="background-color: #4CAF50; color: white;">
                            <tr>
                                <th>Doc. Type</th>
                                <th>Date Issued</th>
                                <th>Name</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($doc as $row)
                                <tr>
                                    <td>{{ $row->document_type }}</td>
                                    <td>{{ $row->issue_date }}</td>
                                    <td>{{ $row->RqDocToCit->lname }}, {{ $row->RqDocToCit->fname }} {{ $row->RqDocToCit->mname }}</td>
                                    <td>{{ $row->RqDocToEmp->e_fname }} {{ $row->RqDocToEmp->e_lname }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('rqDocuments.edit', $row->id)}}" class="btn w-100 osh-btn-edit">Edit</a>
                                            
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn w-100 osh-btn-del" data-bs-toggle="modal" data-bs-target="#deleteModalDoc{{$row->id}}">
                                            Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModalDoc{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalDoc{{$row->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 text-dark" id="deleteModalDoc{{$row->id}}Label"><strong>DELETE | Document</strong></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form action="{{route('rqDocuments.destroy', $row->id)}}" method="post" class="m-0">
                                                            @csrf
                                                            @method('delete')

                                                            <div class="modal-body text-dark">
                                                                <h4>Are you sure you want to <strong>DELETE {{ $row->RqDocToCit->lname }}, {{ $row->RqDocToCit->fname }} {{ $row->RqDocToCit->mname }}'s</strong> document?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row w-100">
                                                                    <div class="col col-6">
                                                                        <button type="submit" class="btn text-white w-100" style="background-color: #DC3545;"><h5>Delete</h5></button>
                                                                        
                                                                    </div>
                                                                    <div class="col col-6">
                                                                        <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- End Delete Modal -->
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

    {{-- Add JavaScript for Sorting and Searching --}}
    <script>
        let sortOrder = 'asc'; // Default sort order

        // Sorting Functionality
        document.querySelectorAll('.sort-option').forEach(option => {
            option.addEventListener('click', function (e) {
                e.preventDefault();
                const column = this.getAttribute('data-column');
                toggleSort(column);
            });
        });

        function toggleSort(column) {
            const table = document.querySelector("#tableBody");
            const rows = Array.from(table.rows);

            // Sort rows based on the selected column
            rows.sort((a, b) => {
                const cellA = a.cells[column].innerText.toLowerCase();
                const cellB = b.cells[column].innerText.toLowerCase();

                if (sortOrder === 'asc') {
                    return cellA.localeCompare(cellB, undefined, { numeric: true });
                } else {
                    return cellB.localeCompare(cellA, undefined, { numeric: true });
                }
            });

            // Reorder rows in the table
            rows.forEach(row => table.appendChild(row));

            // Toggle sort order
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
        }

        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll("#tableBody tr");

            rows.forEach(row => {
                const docType = row.cells[0].innerText.toLowerCase();
                if (docType.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Clear Search
        document.getElementById('clearSearch').addEventListener('click', function () {
            const searchInput = document.getElementById('searchInput');
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input')); // Trigger the input event to reset the table
        });
    </script>

    <!-- Request Doc Modal -->
    <div class="modal modal-lg fade" id="reqDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reqDocLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reqDocLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('rqDocuments.store')}}" method="post">
                    @csrf
                    <div class="modal-body osh-md-bg">
                        <div class="row justify-content-center m-0 mt-2">
                            <div class="col col-6 p-1">
                                <div class="osh-outline">
                                    <label for="emp"><h3>Employee</h3></label>
                                    <input type="text" name="" value="{{$emp->e_fname}} {{$emp->e_lname}}" readonly class="form-control">
                                    <input type="text" name="emp" value="{{$emp->id}}" hidden>
                                </div>
                            </div>
                            <div class="col col-6 p-1">
                                <div class="osh-outline">
                                    <label for="issue_date"><h3>Issued At:</h3></label>
                                    <input type="date" name="date" class="form-control" value="{{old('date')}}">
                                    @error('date')                               
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('addMunModal'));
                                                crDocModal.show();
                                            })
                                        </script>                                    
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        <div class="row m-0 mt-2">
                            
                            <div class="col col-6 p-1">
                                <div class="osh-outline">
                                    <label for="sel_cit"><h3>Citizen:</h3></label>
                                    <select name="sel_cit" id="sel_cit" class="form-select">
                                        <option value="">None</option>
                                        @foreach($citizen as $row)
                                            <option value="{{$row->id}}">{{$row->lname}}, {{$row->fname}} {{$row->mname}}</option>
                                        @endforeach
                                    </select>
                                    @error('sel_cit')                                  
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('addMunModal'));
                                                crDocModal.show();
                                            })
                                        </script>                                
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6 p-1">
                                <div class="osh-outline">
                                    <label for="docType"><h3>Document Type</h3></label>
                                    <input type="text" name="docType" class="form-control" list="docTypeList" value="{{old('docType')}}">
                                    <datalist id="docTypeList">
                                        <option value="Barangay Certificate">
                                        <option value="Barangay Clearance">
                                    </datalist>
                                    @error('docType')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function(){
                                                var crDocModal = new bootstrap.Modal(document.getElementById('addMunModal'));
                                                crDocModal.show();
                                            })
                                        </script>
                                    @enderror
                                </div>
                            </div>
                             
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-success w-100"><h5>Submit</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>
                        
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div><!-- End Request Doc Modal -->

    

    @if($errors->any())

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var crDocModal = new bootstrap.Modal(document.getElementById('reqDoc'));
                crDocModal.show();
            })
        </script>
        
    @endif

@endsection