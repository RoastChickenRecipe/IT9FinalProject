<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for contrast */
            font-family: 'Inter', sans-serif;
        }

        /* Header Styling */
        .header {
            background-color: #1f3d2a; /* Dark green from the logo */
            color: white;
            padding: 10px;
        }
        .header h4 {
            margin: 0;
            font-weight: bold;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #d9f2e6; /* Light green for the sidebar */
            height: calc(100vh - 60px); /* Adjust height to account for the header */
        }
        .sidebar a {
            background-color: #1f3d2a; /* Dark green for sidebar links */
            border-radius: 10px;
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 500;
        }
        .sidebar a:hover {
            background-color: #91cfb8; /* Slightly lighter green for hover */
            color: black;
        }
        .sidebar .logout {
            background-color: #dc3545; /* Red for logout button */
            color: white;
        }
        .sidebar .logout:hover {
            background-color: #a71d2a;
        }

        /* Content Header Styling */
        .content-header {
            background-color: #b3e6cc; /* Light green for content header */
            color: #1f3d2a; /* Dark green text */
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
        }

        /* Buttons */
        .btn-primary {
            background-color: #1f3d2a; /* Dark green for primary buttons */
            border: none;
        }
        .btn-primary:hover {
            background-color: #91cfb8; /* Lighter green for hover */
            color: black;
        }
        .btn-danger {
            background-color: #dc3545; /* Red for danger buttons */
        }
        .btn-danger:hover {
            background-color: #a71d2a;
        }

        /* Table Styling */
        .table thead {
            background-color: #1f3d2a; /* Dark green for table headers */
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #eafaf1; /* Light green for alternating rows */
        }
        .table tbody tr:nth-child(odd) {
            background-color: #ffffff; /* White for alternating rows */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        {{-- Header --}}
        <div class="row header align-items-center">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="ms-3"><em>Barangay Profiling System</em></h4>
                <div class="me-3">
                    {{-- Optional: Add user info or logout button here --}}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Sidebar --}}
            <div class="col-2 sidebar p-3">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/barangaylogo.png') }}" alt="Barangay Logo" class="img-fluid mb-3" style="max-width: 80px;">
                </div>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <a href="{{ route('municipality.index') }}">Address</a>
                <a href="{{ route('households.index') }}">HouseHolds</a>
                <a href="{{ route('rqDocuments.index') }}">Request Doc.</a>
                <a href="{{ route('business-permits.index') }}">Bus. Permits</a>
                <a href="{{ route('complainants.index') }}">Complainants</a>
                <form action="{{ route('logout') }}" method="post" class="mt-3">
                    @csrf
                    <button type="submit" class="btn logout w-100">Logout</button>
                </form>
            </div>

            {{-- Main Content --}}
            <div class="col-10">
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>