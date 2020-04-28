@extends('layouts.dashboard')

@section('babycard')

<style type="text/css">
	table{
		background-color: rgba(222,222,222,0.8);
	}
	th,td{
		padding: 30px;
		min-width: 177px;
		text-align: center;
	}
	.tcard{
        width: 77%;
        margin-top: 30px;
		margin-left: 222px;
	}
	h1{
		color: rgb(222,222,222);
	}
</style>
<div class="tcard">
	<table>
		<h1>Applications</h1>
		<tr>
			<th>ID</th>
			<th>Student</th>
			<th>Class</th>
			<th>Parent Phone</th>
			<th>Parent ID</th>
		</tr>
		<?php 

		$students = DB::table('applications')->get();

		foreach ($students as $student) {
    		echo "<tr><td>".$student->id;
    		echo "</td><td>".$student->sname;
    		echo "</td><td>".$student->class;
    		echo "</td><td>".$student->phone;
    		echo "</td><td>".$student->idno."</td></tr>";
		}

		 ?>
	</table>
</div>
@endsection