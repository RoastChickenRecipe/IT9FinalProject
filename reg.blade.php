<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            max-width: 900px;
            margin: auto;
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
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow">
            <div class="row g-0">
                <!-- Left Panel -->
                <div class="col-md-6 left-panel d-flex flex-column justify-content-center align-items-center p-4">
                    <img src="{{ asset('images/barangaylogo.png') }}" alt="Barangay Logo" class="img-fluid mb-3" style="max-width: 150px;">
                    <h3>Barangay Profiling System</h3>
                </div>
                <!-- Right Panel -->
                <div class="col-md-6 right-panel p-4">
                    <h3 class="text-center mb-4">Register</h3>
                    <form action="{{ route('registerNew') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control" id="fname" placeholder="First Name">
                                @error('fname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" name="lname" value="{{ old('lname') }}" class="form-control" id="lname" placeholder="Last Name">
                                @error('lname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="position" value="{{ old('position') }}" class="form-control" id="position" placeholder="Position">
                                @error('position')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address" placeholder="Address">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contactNum" class="form-label">Contact Number</label>
                                <input type="text" name="contactNum" value="{{ old('contactNum') }}" class="form-control" id="contactNum" placeholder="Contact Number">
                                @error('contactNum')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input type="email" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Email">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('showLogin') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>