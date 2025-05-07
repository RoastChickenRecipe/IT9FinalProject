<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #5cbf9b; /* Match the green header color */
            color: white;
            padding: 10px;
        }
        .header h4 {
            margin: 0;
        }
        .sidebar {
            background-color: #d9f2e6; /* Match the light green sidebar background */
            height: calc(100vh - 60px); /* Adjust height to account for the header */
        }
        .sidebar a {
            background-color: #b3e6cc; /* Match the button background color */
            border-radius: 10px;
            color: black;
            text-decoration: none;
            padding: 10px;
            display: block;
            margin-bottom: 10px;
            text-align: center;
        }
        .sidebar a:hover {
            background-color: #91cfb8; /* Slightly darker green for hover */
            color: white;
        }
        .sidebar .logout {
            background-color: #dc3545;
            color: white;
        }
        .sidebar .logout:hover {
            background-color: #a71d2a;
        }
        .content-header {
            background-color: #b3e6cc; /* Match the content header background */
        }

        .content-main{
            height: 55vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        {{-- Header --}}
        <div class="row header align-items-center">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="ms-3">Barangay Profiling System</h4>
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
                <a href="{{ route('complainants.index') }}">Complaints</a>
                <a href="{{ route('incidents.index') }}">Incidents</a>
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