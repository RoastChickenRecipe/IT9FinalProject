<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #E8F5E9; /* Very Light Green for the background */
            font-family: 'Inter', sans-serif;
        }

        /* Header Styling */
        .header {
            background-color: #4CAF50; /* Primary Green for the header */
            color: white;
            padding: 10px;
        }
        .header h4 {
            margin: 0;
            font-weight: bold;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #F5F5F5; /* Light Gray */
            height: calc(100vh - 60px);
            padding: 15px;
        }

        /* Sidebar Links */
        .sidebar a {
            background-color: #A5D6A7; /* Subtle Green */
            border-radius: 8px;
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #81C784; /* Medium Green for hover */
            color: black;
        }

        /* Active State */
        .sidebar a.active {
            background-color: #4CAF50; /* Dark Green for active state */
            color: white !important; /* Ensure text is white */
            font-weight: bold;
            border-left: 5px solid #388E3C; /* Add a green border for emphasis */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2); /* Optional: subtle shadow */
        }

        .sidebar .logout {
            background-color: #DC3545; /* Red for logout button */
            color: white;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar .logout:hover {
            background-color: #A71D2A;
        }

        /* Content Header Styling */
        .content-header {
            background-color: #C8E6C9; /* Light Green for content header */
            color: #4CAF50; /* Primary Green text */
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
        }

        /* Primary Button */
        .btn-primary {
            background-color: #388E3C; /* Darker Green */
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2E7D32; /* Slightly Darker Green */
            color: white;
        }

        /* Secondary Button */
        .btn-secondary {
            background-color: #C8E6C9; /* Light Green */
            color: black;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #A5D6A7; /* Muted Green */
            color: black;
        }

        /* Action Button */
        .btn-success {
            background-color: #388E3C; /* Darker Green */
            color: white;
            border: none;
        }
        .btn-success:hover {
            background-color: #2E7D32; /* Slightly Darker Green */
            color: white;
        }

        /* Buttons */
        .btn-danger {
            background-color: #DC3545; /* Red for danger buttons */
        }
        .btn-danger:hover {
            background-color: #A71D2A;
        }

        /* Table Styling */
        .table thead {
            background-color: #4CAF50; /* Primary Green for table headers */
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #E8F5E9; /* Very Light Green for alternating rows */
        }
        .table tbody tr:nth-child(odd) {
            background-color: #FFFFFF; /* White for alternating rows */
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
                <a href="{{ route('dashboard.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a href="{{ route('municipality.index') }}" class="sidebar-link {{ request()->routeIs('municipality.index') ? 'active' : '' }}">
                    <i class="bi bi-geo-alt"></i> Address
                </a>
                <a href="{{ route('households.index') }}" class="sidebar-link {{ request()->routeIs('households.index') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> HouseHolds
                </a>
                <a href="{{ route('rqDocuments.index') }}" class="sidebar-link {{ request()->routeIs('rqDocuments.index') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i> Request Doc.
                </a>
                <a href="{{ route('business-permits.index') }}" class="sidebar-link {{ request()->routeIs('business-permits.index') ? 'active' : '' }}">
                    <i class="bi bi-briefcase"></i> Bus. Permits
                </a>
                <a href="{{ route('complainants.index') }}" class="sidebar-link {{ request()->routeIs('complainants.index') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots"></i> Complaints
                </a>
                <a href="{{ route('incidents.index') }}" class="sidebar-link {{ request()->routeIs('incidents.index') ? 'active' : '' }}">
                    <i class="bi bi-exclamation-triangle"></i> Incidents
                </a>
                <form action="{{ route('logout') }}" method="post" class="mt-3">
                    @csrf
                    <button type="submit" class="btn logout w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>

            {{-- Main Content --}}
            <div class="col-10">
                <div class="p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>