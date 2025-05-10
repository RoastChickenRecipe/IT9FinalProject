@extends('layouts.mainLayout')
@section('title', 'Business Permit')
@section('content')
    
{{-- MAIN CONTENT --}}
    <div class="container-fluid p-4" style="background-color: #E8F5E9; border-radius: 10px;">
        {{-- HEADER --}}
        <div class="row align-items-center justify-content-between mb-3" style="background-color: #C8E6C9; border-radius: 10px; padding: 10px;">
            <div class="col-6">
                <h4 class="text-dark">Business Permit</h4>
            </div>
            <div class="col-3">
                <a href="{{ route('business-permits.create') }}" class="btn w-100" style="background-color: #388E3C; color: white; border-radius: 10px;">Apply Permit</a>
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
                <button id="sortButton" class="btn btn-primary w-100" onclick="toggleSort()" style="background-color: #4CAF50; color: white; border-radius: 10px;">
                    Sort Name <span id="sortArrow">↑</span>
                </button>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="content-main row">
            <div class="col-12">
                <div class="table-responsive" style="background-color: #E8F5E9; border-radius: 10px; padding: 10px;">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #4CAF50; color: white;">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact#</th>
                            <th>Bus. Structure</th>
                            <th>Applied</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($busData as $row)
                            <tr>
                                <td>{{$row->b_lname}}, {{$row->b_fname}} {{$row->b_mname}}</td>
                                <td>{{$row->BusToMun->mun_name}}, {{$row->BusToBrgy->brgy_name}} - {{$row->BusToSubd->subd_name}}</td>
                                <td>{{$row->b_contactNum}}</td>
                                <td>{{$row->bus_structure}}</td>
                                <td>{{$row->created_at}}</td>
                                <td><a href="{{route('business-permits.show', $row->id)}}" class="btn btn-success btn-sm"  style="background-color:rgb(34, 62, 219); color: white; border-radius: 5px;">
                                View</a></td>
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

    function toggleSort() {
        const table = document.querySelector("#tableBody");
        const rows = Array.from(table.rows);

        // Sort rows based on the first column (Name)
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