@props(['post'=>$post])

{{-- post container --}}
<div class="container mb-6">
    {{-- user's post content --}}
    <div class="container">
        <a href="{{route('users.posts',$post->user)}}" class="font-bold capitalize">{{$post->user->name}} <span class="text-sm text-gray-600">{{$post->created_at->diffForhumans()}}</span></a>
        <p class="mb-1">{{$post->body}}</p>
    </div>
    {{-- likes , dislikes and delete option--}}
    <div class="flex items-center">
        @auth
            @if (!$post->isLikedBy(auth()->user()))
                <form action="{{route('posts.likes',$post)}}" class="mr-2" method="POST">
                    @csrf
                    <button class="text-blue-500" type="submit">Like</button>
                </form>
            @else
                <form action="{{route('posts.likes',$post)}}" class="mr-2" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-blue-500" type="submit">Dislike</button>
                </form>
            @endif
            <span>{{$post->likes()->count()}} {{Str::plural('like', $post->likes()->count())}}</span>
            {{-- delete post option --}}
            @can('delete',$post)
                <form action="{{route('posts.destroy',$post)}}" class="mx-2" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="text-blue-500" type="submit">Delete</button>
                </form>
            @endcan
        @endauth
    </div>
</div>    