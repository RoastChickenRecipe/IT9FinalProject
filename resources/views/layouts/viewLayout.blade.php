<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('view-title', 'Custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    /* General Styling */
    .osh-bg {
        background-color: #F5F5F5; /* Softer background */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .osh-outline {
        background-color: #E8F5E9; /* Light green */
        border-radius: 10px;
        padding: 10px;
        border: 1px solid #DADADA; /* Light border */
    }

    .osh-md-bg {
        background-color: #81C784;     
        padding: 5px;
    }

    .osh-outline-sec {
        background-color: #C8E6C9; /* Slightly darker green for sections */
        border: 1px solid #A5D6A7; /* Light border */
        border-radius: 8px;
        padding: 10px;
    }

    /* Button Styling */
    .btn {
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-success {
        background-color: #4CAF50; /* Consistent green */
        border: none;
    }

    .btn-success:hover {
        background-color: #45A049; /* Slightly darker green on hover */
    }

    .btn-primary {
        background-color: #007BFF; /* Blue for edit */
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Slightly darker blue on hover */
    }

    .btn-danger {
        background-color: #DC3545; /* Consistent red */
        border: none;
    }

    .btn-danger:hover {
        background-color: #C82333; /* Slightly darker red on hover */
    }

    .btn-secondary {
        background-color: #6C757D; /* Neutral gray */
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5A6268; /* Slightly darker gray on hover */
    }

    /* Text Styling */
    h4, h5 {
        color: #333; /* Darker text for better readability */
    }

    /* Ensure text-white is not overridden */
    .btn h5 {
        color: inherit !important; /* Inherit the button's text color */
    }

    .text-white {
        color: white !important; /* Force white text */
    }

    .osh-text-ul {
        text-decoration: underline;
        font-weight: bold;
    }

<<<<<<< HEAD
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
    
=======
    /* Floating Box Styling */
>>>>>>> 28ec3a77f1fe63dd89cdbd55cdccd74e60da84e4
    .floating-box {
        position: sticky;
        top: 50px;
        left: 20px;
    }

    /* Card Styling */
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        background-color: #E8F5E9; /* Light green */
    }
</style>
<body>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center">
            @yield('floating') <!-- Floating buttons or other content -->
            <div class="col col-8 py-5">
                <div class="card shadow">
                    <div class="card-body">
                        @yield('view-content') <!-- Main content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>