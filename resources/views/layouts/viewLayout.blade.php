<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('view-title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
        body {
            background-color: #f8f9fa; /* Light gray background for contrast */
            font-family: 'Inter', sans-serif;
        }

        /* General Styling */
        .osh-outline {
            background-color: #b3e6cc; /* Light green background */
            border: solid 2px #1f3d2a; /* Dark green border */
            border-radius: 10px;
            padding: 10px;
        }

        .osh-bg {
            background-color: #d9f2e6; /* Light green background */
            border: solid 2px #1f3d2a; /* Dark green border */
            border-radius: 10px;
            padding: 15px;
        }

        /* Header Section */
        .content-header {
            background-color: #1f3d2a; /* Dark green background */
            border-radius: 10px;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #1f3d2a; /* Dark green button */
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
            font-weight: 500;
        }

        .btn-custom:hover {
            background-color: #91cfb8; /* Lighter green on hover */
            color: black;
        }

        .btn-danger {
            background-color: #dc3545; /* Red for danger buttons */
            border-radius: 5px;
            padding: 8px 15px;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }

        /* Floating Box */
        .floating-box {
            background-color: #b3e6cc; /* Light green background */
            border: solid 2px #1f3d2a; /* Dark green border */
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Table Styling */
        .table-header {
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
    <div class="container-fluid vh-100 p-4">
        {{-- Header Section --}}
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="content-header">@yield('view-title', 'Custom Title')</h4>
            </div>
        </div>

        {{-- Main Content Section --}}
        <div class="row justify-content-center">
            @yield('floating')
            <div class="col col-10 py-5">
                <div class="osh-bg shadow">
                    <div class="osh-outline">
                        @yield('view-content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>