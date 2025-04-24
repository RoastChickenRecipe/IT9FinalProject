<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('{{ asset('images/15davaocityhall.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .left-panel {
            background-color: rgb(145, 207, 137);
            color: black;
            text-align: center;
        }
        .right-panel {
            background-color: #f8f9fa;
        }
        .form-control {
            border-radius: 10px;
            background-color: #e9f5e9; 
            border: 1px solid #91cf89; 
        }
        .form-control:focus {
            background-color: #d8f0d8; 
            border-color: #6bbf6b; 
            box-shadow: none; 
        }
        .form-label {
            font-weight: bold; 
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        a {
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-7">
                <div class="card shadow">
                    <div class="row g-0">
                        <!-- Left Panel -->
                        <div class="col-md-6 left-panel d-flex flex-column justify-content-center align-items-center p-4">
                            <img src="{{ asset('images/barangaylogo.png') }}" alt="Barangay Logo" class="img-fluid mb-3" style="max-width: 150px;">
                            <h3>Barangay Profiling System</h3>
                        </div>
                        <!-- Right Panel -->
                        <div class="col-md-6 right-panel p-4">
                            <h3 class="text-center mb-4">Sign In</h3>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="email" name="username" value="{{ old('username') }}" class="form-control" id="username">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" name="pass" class="form-control" id="pass">
                                    @error('pass')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                @if(session()->pull('fail'))
                                    <small class="text-danger d-block mt-2">Incorrect Username And Password</small>
                                @endif
                                <div class="text-center mt-3">
                                    <small>Don't have an account? <a href="{{ route('register') }}">Register here</a></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>