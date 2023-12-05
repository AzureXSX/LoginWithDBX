@extends('layouts.app')

@section('title-block')
Instagram
@endsection

@section('myCss')
    @vite(['resources/js/mainpage.js'])
@endsection

@section('content')

<div class="main-div-x">
    <div id="hello-react"></div>
</div>

@endsection

@section('myjsfile')
    @viteReactRefresh
    @vite(['resources/js/components/post.jsx'])
@endsection

