<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('view-title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .osh-outline {
        background-color: #C8E6C9; 
        border-radius:10px;
        padding: 5px;
    }

    .osh-md-bg {
        background-color: #81C784;     
        padding: 5px;
    }

    .osh-outline-sec {
        background-color: rgb(39, 57, 28); 
        border: solid 2px rgb(31, 125, 83);  
        border-radius:10px;
        padding: 5px;
        color: white
    }

    .osh-text-ul {
        border-bottom: solid 2px black;"
    }

    .osh-btn-add {
        background-color: #E8F5E9; 
        border: solid 2px black;  
        border-radius:10px;
        color: black;
    }

    .osh-btn-add:hover{
        background-color: rgb(61, 141, 122);
        color: white;
    }

    .osh-btn-del {
        background-color: #E8F5E9;
        border: solid 2px tomato;  
        border-radius:10px;
        color: red;
    }

    .osh-btn-del:hover {
        background-color: tomato;
        color: white;
    }

    .osh-btn-back {
        background-color: #388E3C;
        border: solid 2px black;  
        border-radius:10px;
        color: white;
    }

    .osh-btn-back:hover{
        background-color: rgb(61, 141, 122);
        color: white;
    }

    .osh-btn-cancel {
        background-color: #E8F5E9;
        border: solid 2px black;  
        border-radius:10px;
        color: black;
    }

    .osh-bg {
        background-color: #E8F5E9; 
        border-radius:10px;
        padding: 5px;
    }
    
    .floating-box {
        position: sticky;
        top: 50px;
        left: 20px;
    }

</style>
<body>
    
    <div class="container-fluid vh-100">
        
        <div class="row justify-content-center">
            
            @yield('floating')
            <div class="col col-8 py-5">
                <div class="card shadow">
                    <div class="card-body" style="background-color: #C8E6C9;">
                        @yield('view-content')
                    </div>
                </div>
            </div>
        </div>
            
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
</body>
</html>