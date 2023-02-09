@extends('layouts.app')

@section('content')
    <div class="container flex justify-center items-center mt-8 mx-auto">
        <div class="">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class=" mb-2">
                    <label class="font-sans font-medium" for="name">Name</label>
                    <input type="text" name="name" class="w-full px-2 py-1 border-2 rounded-md @error('name') border-red-600 @enderror" id="name" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
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
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-500 rounded-lg text-white px-4 py-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection