@extends('layouts.mainLayout')
@section('title', 'Address')
@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Address</h4>
            </div>
            <div class="col-3">
                <button type="button"  class="btn osh-btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addMunModal">
                    Add Municipality
                </button>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- SEARCH BAR AND SORTING --}}
        <div class="row mt-3 mb-3">
            <div class="col-md-9 col-sm-8">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Municipality" style="border-radius: 0; border: none;">
                    <button class="btn" id="clearSearch" style="background-color: #b3e6cc; color: black; border: none;">Cancel</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
                <div class="dropdown">
                    <button class="btn osh-drop w-100 dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="sortTable(0)">Municipality</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortTable(1)">Region</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortTable(2)">Total Brgy</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortTable(3)">Total Subd</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortTable(4)">Population</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12">
                <div class="table-responsive" style="background-color: #E8F5E9; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered">
                        <thead style="background-color: #4CAF50; color: white;">
                            <tr>
                                <th>Municipality</th>
                                <th>Region</th>
                                <th>Total Brgy</th>
                                <th>Total Subd</th>
                                <th>Population</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($data as $row)
                                <tr>
                                    
                                    <td>{{ $row->mun_name }}</td>
                                    <td>{{ $row->region }}</td>
                                    <td>{{ $row->MunToBrgy->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToBrgy->flatMap->BrgyToSubd->groupBy('id')->count() }}</td>
                                    <td>{{ $row->MunToHhold->flatMap->HholdToCit->groupBy('id')->count() }}</td>
                                    <td>
                                        <a href="{{ route('municipality.show', $row->id) }}" class="btn osh-btn-edit w-100">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal | Add mun --}}
    <div class="modal fade" id="addMunModal" tabindex="-1" aria-labelledby="addMunModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMunModalLabel">Add Municipality</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('municipality.store')}}" method="post">
                    @csrf
                    <div class="modal-body osh-md-bg"> 
                    
                        {{-- For Input Form --}}
                        <div class="row justify-content-center m-0 mt-2">
                            <div class="col col-12 p-1">
                                <div class="osh-outline">
                                    <label for="munName"><h4>Municipal Name:</h4></label> <br>
                                    <input type="text" name="munName" class="form-control" value="{{old('munName')}}">
                                    @error('munName')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center m-0 mt-2">
                            <div class="col col-12 p-1">
                                <div class="osh-outline">
                                    <label for="region"><h4>Region:</h4></label> <br>
                                    <input type="text" name="region" class="form-control" value="{{old('region')}}">
                                    @error('region')
                                        <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col col-6">
                                <button type="submit" class="btn btn-success w-100"><h5>Add</h5></button>
                            </div>
                            <div class="col col-6">
                                <button type="button" class="btn osh-btn-cancel w-100" data-bs-dismiss="modal"><h5>Close</h5></button>
                            </div>
                        </div>
                        
                        
                    </div>
                </form>

            </div>
        </div>
    </div> {{-- End Modal | Add mun --}}

    <script>
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function(){
                var crDocModal = new bootstrap.Modal(document.getElementById('addMunModal'));
                crDocModal.show();
            })
        @endif
    </script>

    {{-- Sorting and Searching --}}
    <script>
        let sortOrder = 'asc'; // Default sort order

        function toggleSort() {
            const table = document.querySelector("#tableBody");
            const rows = Array.from(table.rows);

            // Sort rows based on the first column (Municipality)
            rows.sort((a, b) => {
                const cellA = a.cells[0].innerText.toLowerCase();
                const cellB = b.cells[0].innerText.toLowerCase();

                if (sortOrder === 'asc') {
                    return cellA.localeCompare(cellB);
                } else {
                    return cellB.localeCompare(cellA);
                }
            });

            // Reorder rows in the table
            rows.forEach(row => table.appendChild(row));

            // Toggle sort order and update arrow
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
            document.getElementById('sortArrow').innerText = sortOrder === 'asc' ? '↑' : '↓';
        }

        function sortTable(columnIndex) {
            const table = document.querySelector("#tableBody");
            const rows = Array.from(table.rows);

            rows.sort((a, b) => {
                const cellA = a.cells[columnIndex].innerText.toLowerCase();
                const cellB = b.cells[columnIndex].innerText.toLowerCase();

                return cellA.localeCompare(cellB);
            });

            rows.forEach(row => table.appendChild(row));
        }

        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll("#tableBody tr");

            rows.forEach(row => {
                const municipality = row.cells[0].innerText.toLowerCase();
                if (municipality.includes(filter)) {
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

@endsection
