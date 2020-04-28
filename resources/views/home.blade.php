@extends('layouts.dashboard')

<style type="text/css">
    .tcard{
        margin-left: 200px;
        height: 33vh;
    }
    .homecard{
        width: 70%;
        background-color: rgba(222,222,222,0.7);
        margin: 40px;
        padding: 20px;
        display: inline-flex;
    }
    .upic{
        align-items: center;
        height: 100%;
        width: 26vh;
    }
    .upic img{
        width: 100%;
        height: 24vh;
    }
    .upic button{
        width: 100%;
    }
    .details-card{
        padding: 20px;
        margin-left: 20px;
        height: 90%;
        border-left: 3px solid black;
    }
    .details-card li{
        list-style: none;
    }
    #desc{
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 111px;
        padding: 20px;
        width: 100%;
    }
    form{
        width: 100%;
    }
    form button{
        float: right;
        width: 33%;
        color: black;
        background-color: rgb(222,0,222);
        border: 0px;
        padding: 10px 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }
    .alert{
        padding: 10px;
        text-align: center;
    }
    .alert-success{
        background-color: rgb(111,222,111);
    }
    .alert-danger{
        background-color: rgba(222,0,0,0.5);
    }
    .image-placeholder{
        margin: 0 auto;
    }
    .image-placeholder img{
        width: 333px;
    }
</style>

<script type="text/javascript">
    function transferClick() {
        document.querySelector('#image').click();
    }
    function displayImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#pickpic').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    function transferProfileClick() {
        document.querySelector('#pic').click();
    }
    function displayProfile(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#profilePic').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>
@section('babycard')

<div class="tcard">

    <div class="card-body">
        @if(\Session::has('success'))
                <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                </div>
                @endif

    </div>
    <div class="homecard">
        <div class="upic">
            <p>Click to edit profile</p>
            <form method="POST" action="{{ url('makeprofile') }}">
                @csrf
                <img onclick="transferProfileClick()" id="profilePic" src="{{ Auth::user()->pic }}">
                <input onchange="displayProfile(this)" type="file" style="visibility: hidden;" name="pic" id="pic" required>
                <button>UPDATE</button>
            </form>
        </div>
        <div class="details-card">
            <h1>USER DETAILS;</h1>
            <ul>
                <li><h2>Name: {{ Auth::user()->name }}</h2></li>
                <li><h2>Email: {{ Auth::user()->email }}</h2></li>
            </ul>
            <p>NOTE: This page is for authenticated use only!!</p>
        </div>
    </div>
    <div class="homecard">
        <form method="POST" action="{{ url('makeblog') }}">
            <h1>MANAGE BLOG</h1>
            @csrf
            <label for="image">Click avatar to add an image </label>
            <div class="image-placeholder">
                <img onclick="transferClick()" id="pickpic" src="/images/image-placeholder.png">
            </div>
            <input type="file" onchange="displayImg(this)" name="image" style="visibility: hidden;" id="image" required>
            <br><br>
            <label for="desc">Add a short description: </label>
            <textarea name="desc" id="desc" maxlength="255"></textarea>
            <br><br>
            <button type="submit">POST</button>
            <br><br>
        </form>
    </div>
</div>
@endsection
