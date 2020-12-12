@extends('layouts.app')

@section('style')
@endsection

@section('content')
Not an admin <br>
Redirecting in <span id="num">5</span>
@endsection

@section('scripts')
<script>
    text = document.querySelector('#num');
    console.log(text);
    redirectIn();

    async function redirectIn() {
        for(i = 5; i > 0; i--){
            await new Promise(r => setTimeout(r, 1000));
            console.log(i);
            text.innerHTML = i-1;
        }
        window.location.href= 'http://localhost:8000/';
    }
</script>
@endsection
