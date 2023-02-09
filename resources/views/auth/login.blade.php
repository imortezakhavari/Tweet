@extends('layouts.app')

@section('content')
    <div class="container flex justify-center items-center mt-8 mx-auto">
        <div class="">
            @if (session('status'))
                {{session('status')}}
            @endif
            <form action="{{route('login')}}" method="POST" novalidate>
                @csrf
                <div class=" mb-2">
                    <label class="font-sans font-medium" for="email">Email</label>
                    <input type="email" name="email" class="w-full px-2 py-1 border-2 rounded-md @error('email') border-red-600 @enderror" id="email" value="{{old('email')}}">
                    @error('email')
                        <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class=" mb-2">
                    <label class="font-sans font-medium" for="password">Password</label>
                    <input type="password" name="password" class="w-full px-2 py-1 border-2 rounded-md @error('password') border-red-600 @enderror" id="password" value="{{old('password')}}">
                    @error('password')
                        <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-500 rounded-lg text-white px-4 py-1">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection