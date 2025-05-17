@extends('layouts.mainLayout')
@section('title', 'Complainants')

@section('content')

    {{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Complainants</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('complainants.create') }}" class="btn w-100 osh-btn-primary">Report Complaint</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- SEARCH BAR AND SORTING --}}
        <div class="row mt-3 mb-3">
            <div class="col-md-9 col-sm-8">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Name" style="border-radius: 0; border: none;">
                    <button class="btn" id="clearSearch" style="background-color: #b3e6cc; color: black; border: none;">Cancel</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:rgb(0, 24, 245); color: white; border-radius: 10px;">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item sort-option" data-column="0" href="#">Name</a></li>
                        <li><a class="dropdown-item sort-option" data-column="1" href="#">Address</a></li>
                        <li><a class="dropdown-item sort-option" data-column="2" href="#">Contact #</a></li>
                        <li><a class="dropdown-item sort-option" data-column="3" href="#">Date Reported</a></li>
                        <li><a class="dropdown-item sort-option" data-column="4" href="#">Issued By</a></li>
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact #</th>
                                <th>Date Reported</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->com_fname }} {{ $row->com_lname }}</td>
                                    <td>{{ $row->ComplToMun->mun_name }}, {{ $row->ComplToBrgy->brgy_name }} {{ $row->ComplToSubd->subd_name }}</td>
                                    <td>{{ $row->com_contactNum }}</td>
                                    <td>{{ $row->date_reported }}</td>
                                    <td>{{ $row->ComplToEmp->e_lname }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('complainants.edit', $row->id) }}" class="btn osh-btn-edit w-100">Edit</a>
                                            <a href="{{ route('complainants.show', $row->id) }}" class="btn osh-btn-edit w-100">View</a>
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
                const name = row.cells[0].innerText.toLowerCase();
                if (name.includes(filter)) {
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