@extends('layouts.app')

@section('style')
@endsection

@section('content')
    @auth
        <form action="{{ route('posts') }}" method="post">
            {{ csrf_field() }}
            <center>
                <label for="body">Body</label><br>
                <textarea name="body" id="body" cols="30" rows="10" class="@error('body') border-red @enderror"></textarea><br>
                @error('body')
                <div class="color-red">
                    {{ $message }}
                </div><br>
                @enderror
                <button type="submit">Post</button>

            </center>
        </form>
    @endauth

    <center>
        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            {{ $posts->links() }}
        @else
            <p>There are no posts.</p>
        @endif
    </center>
@endsection
