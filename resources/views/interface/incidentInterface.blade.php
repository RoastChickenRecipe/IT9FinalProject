@extends('layouts.mainLayout')
@section('title', 'Incidents')

@section('content')

{{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Incidents</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('incidents.create') }}" class="btn w-100 osh-btn-primary">Log Incident</a>
            </div>
        </div>

        {{-- LINE --}}
        <hr style="border: 1px solid #A5D6A7; margin: 0;">

        {{-- SEARCH BAR AND SORTING --}}
        <div class="row mt-3 mb-3">
            <div class="col-md-9 col-sm-8">
                <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Incident Type" style="border-radius: 0; border: none;">
                    <button class="btn" id="clearSearch" style="background-color: #b3e6cc; color: black; border: none;">Cancel</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:rgb(0, 38, 255); color: white; border-radius: 10px;">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item sort-option" data-column="0" href="#">Incident Type</a></li>
                        <li><a class="dropdown-item sort-option" data-column="1" href="#">Address</a></li>
                        <li><a class="dropdown-item sort-option" data-column="2" href="#">Issued By</a></li>
                        <li><a class="dropdown-item sort-option" data-column="3" href="#">Incident Reported</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12" style="overflow: auto;">
                <div class="table-responsive" style="background-color: #d9f2e6; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered">
                        <thead style="background-color: #91cfb8; color: black;">
                            <tr>
                                <th>Incident Type</th>
                                <th>Address</th>
                                <th>Issued By</th>
                                <th>Incident Reported</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->incident_type}}</td>
                                    <td>{{$row->inc_address}}</td>
                                    <td>{{$row->IncToEmp->e_fname}} {{$row->IncToEmp->e_lname}}</td>
                                    <td>{{$row->date_reported}}</td>
                                    <td>
                                        <a href="{{route('incidents.show', $row->id)}}" class="btn btn-success btn-sm" style="background-color:rgb(34, 62, 219); color: white; border-radius: 5px;">Show</a>
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
                const incidentType = row.cells[0].innerText.toLowerCase();
                if (incidentType.includes(filter)) {
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