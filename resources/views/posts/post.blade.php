@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <center>
        <x-post :post="$post" />
    </center>
@endsection
