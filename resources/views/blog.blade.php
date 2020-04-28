@extends('layouts.app')

@section('content')

<style type="text/css">
	.blogcard{
		width: 100%;
		margin: 0 auto;
	}
	.blogcard div{
		width: 77%;
		background-color: rgba(0,0,0,0.5);
		padding: 30px;
	
		margin: 0 auto;
	}
	.blogcard img{
		width: 100%;
		height: auto;

	}
	p{
		color: rgb(222,222,222);
	}
	.bloghead{
		color: rgb(222,222,222);
	}
</style>
<div class="blogcard">
	<div class="bloghead">
		<h2>BLOG - Past events and activities in and involving Aimeel</h2>
	</div>
	<?php 

	$blogs = DB::table('blogs')->get();

	foreach ($blogs as $blog) {
		echo '<div><img src="'.$blog->pic.'"><p>'.$blog->description.'</p></div>';
	}

	?>
	
</div>

@endsection