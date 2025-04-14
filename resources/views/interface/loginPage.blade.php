<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid vh-100">
            
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-7 border">
                <div class="card shadow">
                    <div class="card-Body">

                        <div class="row">
                            <div class="col col-7 border">
                                <h1>Content Here</h1>
                            </div>

                            <div class="col col-5 border">
                                <p>login here</p>

                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col col-10 border p-1" style="border-radius: 10px; background-color:rgb(145, 207, 137);">
                                            <label for="user"><h5>Username:</h5></label>
                                            <input type="email" name="username" value="{{old('username')}}" class="form-control">
                                            @error('username')
                                                <h4 style="color: red;">{{$message}}</h4>
                                            @enderror
                                        </div>

                                        <div class="col col-10 border mt-3 p-1" style="border-radius: 10px; background-color:rgb(145, 207, 137);">
                                            <label for="pass"><h5>Password:</h5></label>
                                            <input type="password" name="pass" class="form-control">
                                            @error('pass')
                                                <h4 style="color: red;">{{$message}}</h4>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-5">
                                        <div class="col col-6">
                                            <button type="submit" class="btn btn-primary w-100">Login</button>
                                            @if(session()->pull('fail'))
                                            <h6 style="color: red;">Incorrect Username And Password</h6>
                                            @endif
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col col-6">
                                            <a href="{{route('register')}}">reg</a>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>

                
                        
                    </div>{{-- END CARD-BODY --}}
                </div>
            </div>
        </div>
            
        
    </div>
    
</body>
</html>