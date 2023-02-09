@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 rounded-lg mb-4">
            @auth
                <form action="{{route('posts')}}" method="POST">
                    @csrf
                    {{-- text area for user to write --}}
                    <div class="">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-200 focus:outline-blue-400 border-2 rounded w-full p-4 @error('body') border-red-500 @enderror" placeholder="Write Something!"></textarea>
                        @error('body')  
                            <div class="text-sm text-red-500 mt-2">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    {{--Post button --}}
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white px-6 py-1">Post</button>
                    </div>
                </form>
            @endauth
            {{-- show posts --}}
            <div class="mt-8">
                @if($posts->count())
                    @foreach ($posts as $post)
                    {{-- post container --}}
                    <x-single-post :post="$post" />
                    @endforeach
                    <div class="mt-6">{{$posts->links()}}</div>
                @else
                    <p>There are no posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection