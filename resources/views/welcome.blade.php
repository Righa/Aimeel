@extends('layouts.app')

@section('content')

<style type="text/css">
    .blind-card{
        height: 66vh;
        width: 100%;
    }
    .intro{
        color: rgb(222,0,222);
        width: 66%;
        height: 100%;
        text-align: center;
        margin: 0 auto;
    }
    .intro a{
        padding: 33px 33px;
        border-radius: 77px;
        text-decoration: none;
        color: black;
        background-color: rgb(222,0,222);
        transition: all 0.3s ease-out;
    }
    .intro a:hover{
        border-radius: 11px;
        padding: 33px 66px;
        transition: all 0.3s ease-in;
    }
    .gallery{
        padding-top: 30px;
        background-color: rgba(222,222,222,0.8);
        height: 66vh;
        width: 100%;
        text-align: center;
    }
    .gallery-con{
        background-color: rgba(222,222,222,0.8);
        border-top: 5px solid rgb(222,0,222);
        margin: 0 auto;
        width: 88%;
        height: 44vh;
        overflow-x: scroll;
    }
    .gallery-con div{
        display: inline-block;
        height: 88%;
        width: 22%;
        padding: 20px;
        background-color: rgba(222,222,222,0.5);
        color: black;
    }
    .gallery-con img{
        width: 100%;
        height: 24vh;
    }
    
    h2 img{
        height: 33px;
    }
    .contacts{
        padding: 30px;
        background-color: rgb(222,0,222);
    }
</style>

<div class="blind-card">
    <div class="intro">
        <br>
        <h1>WELCOME TO AIMEEL !</h1>
        <br>
        <h1>Aimeel preparatory is devoted to excellence in teaching and learning, and to developing leaders who make a difference to society.
The School, which is located in Ruiru, has an enrollment of over 1,000 students.
</h1>
<br>
<h1><a href="vacancies">Register for vacancies > </a></h1>
    </div>
</div>

<div class="gallery">
    <h1>GALLERY</h1>
    <br>
    <div class="gallery-con">
        <?php 
        $blogs = DB::table('blogs')->take(7)->get();

        foreach ($blogs as $blog) {
            echo '<div><img src="'.$blog->pic.'"><p>'.$blog->description.'</p></div>';
        }

         ?>
    </div>
    <h2>Be updated and learn more about Aimeel on our <a href="blog">blog page</a> or visit our social media: <a target="_blank" href="http://www.facebook.com"><img src="/images/facebook.png"></a> <a target="_blank" href="http://www.twitter.com"><img src="/images/twitter.png"></a> <a target="_blank" href="http://www.instagram.com"><img src="/images/instagram.png"></a></h2>
</div>

<div class="gallery">
    <h1>ACTIVITIES</h1>
    <div class="gallery-con">
        <?php 
        $blogs = DB::table('blogs')->take(7)->skip(3)->get();

        foreach ($blogs as $blog) {
            echo '<div><img src="'.$blog->pic.'"><p>'.$blog->description.'</p></div>';
        }

         ?>
    </div>
    <h2>Be updated and learn more about Aimeel on our <a href="blog">blog page</a> or visit our social media: <a target="_blank" href="http://www.facebook.com"><img src="/images/facebook.png"></a> <a target="_blank" href="http://www.twitter.com"><img src="/images/twitter.png"></a> <a target="_blank" href="http://www.instagram.com"><img src="/images/instagram.png"></a></h2>
</div>

<div class="contacts">
    <h1>Contact us via: </h1>
    <p>0722789097</p>
    <p>0722432398</p>
    <p>Email: aimeelpreparatory@gmail.com</p>
    
</div>

@endsection