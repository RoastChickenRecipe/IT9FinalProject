@extends('layouts.mainLayout')
@section('title', 'HouseHold')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">HouseHold</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('households.create') }}" class="btn w-100 osh-btn-primary">Create Citizen's Form</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- SEARCH BAR AND SORTING --}}
        <div class="row mt-3 mb-3">
            <div class="col-md-9 col-sm-8">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Address" style="border-radius: 0; border: none;">
                    <button class="btn" id="clearSearch" style="background-color: #b3e6cc; color: black; border: none;">Cancel</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:rgb(0, 4, 238); color: white; border-radius: 10px;">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item sort-option" data-column="0" href="#">Address</a></li>
                        <li><a class="dropdown-item sort-option" data-column="1" href="#">Family Count</a></li>
                        <li><a class="dropdown-item sort-option" data-column="2" href="#">Household Type</a></li>
                        <li><a class="dropdown-item sort-option" data-column="3" href="#">Family Income</a></li>
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
                                <th>Address</th>
                                <th>Fam. Count</th>
                                <th>HH. Type</th>
                                <th>Fam. Income</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->HholdToMun->mun_name }}, {{ $row->HholdToBrgy->brgy_name }} {{ $row->HholdToSubd->subd_name }}</td>
                                    <td>{{ $row->HholdToCit->groupBy('id')->count() }}</td>
                                    <td>{{ $row->household_type }}</td>
                                    <td>{{ $row->HholdToCit->sum('income') }}</td>
                                    <td>
                                        <a href="{{ route('households.show', $row->id) }}" class="btn btn-success w-100" style="background-color:rgb(34, 62, 219); color: white; border-radius: 5px;">View</a>
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
                const address = row.cells[0].innerText.toLowerCase();
                if (address.includes(filter)) {
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