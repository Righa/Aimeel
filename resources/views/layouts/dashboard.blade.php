@extends('layouts.app')

@section('content')

<style type="text/css">
    .side-nav{
        position: fixed;
    	padding: 30px;
        text-align: center;
        width: 333px;
        float: left;
    }
    .side-links li{
        background-color: rgb(222,0,222);
        list-style: none;
        width: 100%;
        padding-top: 44px;
        padding-bottom: 44px;
        margin-bottom: 20px;
    }
    .side-links a{
        color: black;
        text-decoration: none;
        transition: all 0.3s ease-in;
        font-weight: bold
    }
    .side-links li:hover{
        background-color: rgba(233,0,233,1);
    }
    .nocard{
    	margin-left: 300px;
    }
</style>

<div>
	<div class="side-nav">
		<ul class="side-links">
			<a href="home"><li>HOME</li></a>
        	<a href="requests"><li>APPLICATIONS</li></a>
        	<a href="update"><li>UPDATE VACANCIES</li></a>
       		<a href="admission"><li>ADMISSION</li></a>
		</ul>
	</div>
	<div class="nocard">
		<main>
			@yield('babycard')
		</main>
	</div>
	
</div>
@endsection