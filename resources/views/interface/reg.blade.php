<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reg</title>
</head>
<body>
    <form action="{{route('registerNew')}}" method="post">
        @csrf
        <input type="text" name="fname" placeholder="first name"> <br>
        @error('fname')
            {{$message}}
        @enderror
        <input type="text" name="lname" placeholder="last name"> <br>
        @error('lname')
            {{$message}}
        @enderror
        <input type="text" name="position" placeholder="position"> <br>
        @error('position')
            {{$message}}
        @enderror
        <input type="text" name="address" placeholder="address"> <br>
        @error('address')
            {{$message}}
        @enderror
        <input type="text" name="contactNum" placeholder="contact number"> <br>
        @error('contactNum')
            {{$message}}
        @enderror
        <input type="email" name="username" placeholder="username"> <br>
        @error('username')
            {{$message}}
        @enderror
        <input type="password" name="password" placeholder="password"> <br>
        @error('password')
            {{$message}}
        @enderror
        <button type="submit">submit</button> 
        <a href="{{route('showLogin')}}">cancel</a>
    </form>
</body>
</html>