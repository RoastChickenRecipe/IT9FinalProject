<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .osh-outline {
        background-color: rgb(239, 227, 194); 
        border: solid 2px black;  
        border-radius:10px;
    }

    .osh-btn-outline {
        background-color: rgb(239, 227, 194); 
        border: solid 2px black;  
        border-radius:10px;
        color: black;
    }

    .osh-btn-outline:hover{
        background-color: black;
        color: white;
    }

    .osh-header {
        background-color: rgb(62, 123, 39); 
        border: solid 2px black;  
        border-radius:10px;
    }

    .osh-bg {
        background-color: rgb(133, 169, 71); 
        border: solid 2px black; 
        border-radius:10px;
    }
</style>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">

            {{-- SIDE PANEL --}}
            <div class="col col-2" style="background-color: rgb(18, 53, 36);">

                <div class="row justify-content-center mt-5">
                    <div class="col col-10">
                        <a href="{{route('view.dashboard')}}" class="osh-btn-outline btn w-100"><h4>Dashboard</h4></a>
                    </div>
                    <div class="col col-10 mt-2">
                        <a href="{{route('view.address')}}" class="osh-btn-outline btn w-100"><h4>Address</h4></a>
                    </div>
                    <div class="col col-10 mt-2">
                        <a href="{{route('view.household')}}" class="osh-btn-outline btn w-100"><h4>HouseHold</h4></a>
                    </div>
                    <div class="col col-10 mt-2">
                        <a href="{{route('rqDocuments.index')}}" class="osh-btn-outline btn w-100"><h4>Request Doc</h4></a>
                    </div>
                    <div class="col col-10 mt-2">
                        <a href="{{route('complainants.index')}}" class="osh-btn-outline btn w-100"><h4>Complainants</h4></a>
                    </div>
                    <div class="col col-10 mt-2">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="osh-btn-outline btn w-100"><h4>Logout</h4></button>
                        </form>
                    </div>
                </div>

            </div>
            {{-- MAIN PANEL --}}
            <div class="col col-10" style="background-color: rgb(62, 123, 39);">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>