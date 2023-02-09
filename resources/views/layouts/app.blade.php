<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    <title>MY BLOG</title>
</head>
<body>
    <nav class="bg-white py-4 px-6 flex justify-between shadow-lg mb-6">
        <ul class="flex items-center">
            <li>
                <a class="p-3" href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a class="p-3" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a class="p-3" href="{{route('posts')}}">Post</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth 
                <li>
                    <a class="p-3 capitalize" href="">{{auth()->user()->name}}</a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="p-3" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a class="p-3" href="{{route('login')}}">Login</a>
                </li>
                <li>
                    <a class="p-3" href="{{route('register')}}">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>