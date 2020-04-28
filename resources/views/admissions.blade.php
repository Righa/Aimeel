@extends('layouts.dashboard')

@section('babycard')

<style type="text/css">
	.bigcard{
		width: 66%;
		margin: 0 auto;
		margin-top: 40px;
	}
	.smallcard{
		margin-left: 22px;
		width: 77%;
		display: inline-flex;
		padding: 30px;
		background-color: rgba(222,222,222,0.8);
	}
    form input{
    	width: 100%;
        border: 0px;
        font-size: 20px;
        border-bottom: 2px solid;
        background-color: rgba(0,0,0,0);
        margin-bottom: 40px;
    }
    form select{
    	width: 100%;
        border: 0px;
        font-size: 20px;
        border-bottom: 2px solid;
        background-color: rgba(0,0,0,0);
        margin-bottom: 40px;
    }
  	form button{
        width: 100%;
        color: black;
        background-color: rgb(222,0,222);
        border: 0px;
        padding: 10px 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }
    form div{
    	width: 44%;
    	display: inline-grid;
    	margin-left: 33px;
    }
    form{
    	width: 100%;
    }
	table{
		background-color: rgba(222,222,222,0.8);
	}
	th,td{
		text-align: center;
		padding: 30px;
		min-width: 144px;
	}
	.tcard h1{
		color: rgb(222,222,222);
		text-align: center;
	}
    .alert{
        padding: 10px;
        text-align: center;
    }
    .alert-success{
        background-color: rgba(0,222,0,0.3);
    }
    .alert-danger{
        background-color: rgba(222,0,0,0.3);
    }
</style>
<div class="bigcard">
	<div class="smallcard">
		
		<form action="{{ url('students') }}" method="post">
			<h1>STUDENT ADMISSION</h1>
			@csrf
			@if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(\Session::has('success'))
                <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                </div>
                @endif
                <div>
                	<label for="name">Name:</label>
					<input type="text" name="name" id="name">
                </div>
                <div>
                	<label for="admn">Admission Number:</label>
					<input type="text" name="admn" id="admn">
                </div>
                <div>
                	<label for="gender">Gender:</label>
					<select id="gender" name="gender">
						<option>male</option>
						<option>female</option>
					</select>
                </div>
                <div>
                	<label for="phone">Parent Phone Number:</label>
					<input type="text" maxlength="10" minlength="10" name="phone" id="phone">
                </div>
                <div>
                	<label for="pid">Parent ID Number:</label>
					<input type="text" maxlength="8" minlength="8" name="pid" id="pid">
                </div>
                <div>
                	<button type="submit">REGISTER</button>
                </div>
			
		</form>
	</div>
	<div class="tcard">
		<h1>STUDENTS</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Admission Number</th>
				<th>Gender</th>
				<th>Parent Phone</th>
				<th>Parent ID</th>
			</tr>

	
		<?php 

		$students = DB::table('students')->get();

		foreach ($students as $student) {
    		echo "<tr><td>".$student->id;
    		echo "</td><td>".$student->name;
    		echo "</td><td>".$student->admn;
    		echo "</td><td>".$student->gender;
    		echo "</td><td>".$student->parentphone;
    		echo "</td><td>".$student->parentid."</td></tr>";
		}

	 ?>
		</table>
	</div>
</div>

@endsection
