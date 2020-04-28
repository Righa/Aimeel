@extends('layouts.app')


@section('content')
<style type="text/css">
    html, body {
        background-color: rgb(55,0,55);
        color: black;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .navbar-brand{
        color: rgb(55,0,55);
        letter-spacing: 5px;
        font-size: 30px;
        text-decoration: none;
    }
    .navbar-nav{
        display: flex;
        justify-content: space-around;
        width: 50%;
    }
    .nav-item{
        margin-right: 20px;
        list-style: none;
    }
    .nav-link{
        color: rgb(55,0,55);
        text-decoration: none;
        letter-spacing: 2px;
        font-weight: bold;
        font-size: 20px;
    }
     nav{
        display: flex;
        background-color: rgba(222,222,222,0.7);
        justify-content: space-around;
        align-items: center;
        min-height: 8vh;
        position: sticky;
        position: -webkit-sticky;
        top: 0;
    }
    .card-body{
        padding: 20px;
    }
    form{
        margin: 0 auto;
        background-color: rgba(222,222,222,0.5);
        padding: 20px 50px;
        width: 444px;
    }
    form button{
        width: 100%;
        color: rgb(222,222,222);
        background-color: rgb(222,0,222);
        border: 0px;
        padding: 10px 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
