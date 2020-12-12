@props(['post' => $post])

<div class="posts text-align-l pad-5">
    <a href="{{ route('user.posts', $post->user) }}"><b>{{ $post->user->username }}</b></a>
    {{ $post->created_at->diffForHumans() }}
    <br>
    <p class="margin-l-5"> &#9; {{ $post->body }}</p>
    @auth
    @if ( !$post->likedBy(auth()->user()) )
    <form action="{{ route('posts.likes', $post) }}" method="post">
        @csrf
        <button type="submit">Like</button>
    </form>
    @else
    <form action="{{ route('posts.likes', $post)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Unlike</button>
    </form>
    @endif

    @can('delete', $post)
    <form action="{{ route('posts.delete', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    @endcan

    @endauth

    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>
