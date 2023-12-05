@extends('layouts.app')

@section('title-block')
Sign Up
@endsection

@section('myCss')
    @vite(['resources/sass/styles.scss'])
@endsection



@section('content')
{{-- @foreach ($data as $item)
    <div>{{$item["UserName"]}}</div>

    <img src="data:image/png;base64, {{$item["UserImage"]}}"/>
@endforeach --}}
<div class="main-div-x">
    <form id="input-form-x">

        <div class="div-hor-x">
            <div class="img-x" id="bg-x-img" onclick="SelectImg()"></div>
            <input name="img" class="pseudo-img-input" id="img-input-x" type="file" accept="image/png, image/gif, image/jpeg"/>
        </div>


        <div class="div-hor-x">
            <input required type="text" autocomplete="off" name="username" placeholder="" id="username" />
            <label
            for="username"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >User</label
            >
        </div>

        <div class="div-hor-x">
            <input required type="text" autocomplete="off" name="email" placeholder="" id="email" />
            <label
            for="email"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >Email</label
            >
        </div>

        <div class="div-hor-x">
            <input required type="password" autocomplete="off" name="password" placeholder="" id="password" />
            <label
            for="password"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >Password</label
            >
        </div>

        <div class="div-hor-x">
            <input required type="password" autocomplete="off" name="repassword" placeholder="" id="repassword" />
            <label
            for="repassword"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >Password</label
            >
        </div>

     

        <div class="div-hor-x">
            <input type="submit" value="Sign Up"/>
        </div>
        
        <div class="div-hor-x">
            <a href="/">Already have an account? Login</a>
        </div>
       
    </form>
</div>

@endsection

@section('myjsfile')
    @vite(['resources/js/signup.js'])
    @vite(['resources/js/img.js'])
@endsection