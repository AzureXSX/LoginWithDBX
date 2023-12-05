@extends('layouts.app')

@section('title-block')
Login
@endsection

@section('myCss')
    @vite(['resources/sass/styles.scss'])
@endsection

@section('content')

<div class="main-div-x">
    <form id="input-form-x">

        <div class="div-hor-x">
            <div class="img-x" id="bg-x-img" ></div>
            {{-- <input name="img" class="pseudo-img-input" id="img-input-x" type="file" accept="image/png, image/gif, image/jpeg"/> --}}
        </div>

        <div class="div-hor-x">
            <input required type="text" autocomplete="off" name="email" placeholder="" id="email" />
            <label
            for="email"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >User</label
            >
        </div>

        <div class="div-hor-x">
            <input  type="text" autocomplete="off" name="password" placeholder="" id="password" />
            <label
            for="password"
            style="--m-top: 1.77rem; --m-top-x: -0rem; --m-left: -18.4rem;--m-left-x: -19.4rem;"
            class="placeholder-x"
            >Password</label
            >
        </div>

     

        <div class="div-hor-x">
            <input type="submit" value="Login"/>
        </div>
        
        <div class="div-hor-x">
            <a href="/SignUp">Don't have an account? Sign up</a>
        </div>
       
    </form>
</div>

@endsection


@section('myjsfile')
    @vite(['resources/js/login.js'])
@endsection