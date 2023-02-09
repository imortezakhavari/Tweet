@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 rounded-lg">
            <div class="p-4 bg-slate-500 text-white rounded-xl">
                <p class="font-bold uppercase tracking-wide">{{$user->name}}</p>
            </div>
            <div class="p-4 bg-slate-200 rounded-xl mt-4">
                @if($posts->count())
                    @foreach ($posts as $post)
                    {{-- post container --}}
                    <x-single-post :post="$post"/>
                    @endforeach
                    <div class="mt-6">{{$posts->links()}}</div>
                @else
                    <p>There are no posts</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection