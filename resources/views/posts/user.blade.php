@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <center>
        <h1>{{ $user->name }}</h1>
        Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} with a total of {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}.
        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            {{ $posts->links() }}
        @else
            <p>{{ $user->name }} does not have any posts.</p>
        @endif
    </center>
@endsection
