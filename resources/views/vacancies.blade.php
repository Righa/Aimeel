@extends('layouts.app')

@section('content')

	<style type="text/css">
            form{
            	bottom: 10%;
            	right: 100px;
            	position: fixed;
            	background-color: rgba(222,222,222,0.7);
            	padding: 20px 50px;
            	width: 444px;
            }
            form input{
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
            form h1{
            	text-align: center;
            }
            .pri-block{
            	display: inline-block;
            	width: 400px;
            	background-color: rgba(222,222,222,0.7);
            	float: left;
            	margin-right: 30px;
            	padding: 20px 40px;
            	margin-bottom: 30px;
            }
            h2{
            	color: rgb(222,222,222);
            	font-weight: bold;
            	font-size: 40px;
            }
            .vacancies-container{
            	width: 55%;
                height: 66vh;
            	margin-left: 100px;
                display: block;
                overflow-y: scroll;
            }
            .vac-head{
                margin-left: 100px;
            }
    form select{
        width: 100%;
        border: 0px;
        font-size: 20px;
        border-bottom: 2px solid;
        background-color: rgba(0,0,0,0);
        margin-bottom: 40px;
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
    <div>
        <div class="container">
            <br>
            <form action="{{ url('makeapp') }}" method="post">
                <h1>Vacancy Application Form</h1>
                {{csrf_field()}}
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
                <label class="apply-con"></label>
                <label for="name">Student Name</label>
                <input type="text" name="name" required>
                <label for="class">Class</label>
                <select id="class" name="class">
                    <?php 

                    $vacancies = DB::table('vacancies')->where('amount','>', 0)->get();

                    foreach ($vacancies as $vacancy) {
                        echo "<option>".$vacancy->class."</option>";
                    }

                     ?>
                </select>
                <label for="phone">Parent Phone Number</label>
                <input type="text" maxlength="10" minlength="10" name="phone" required>
                <label for="id">Parent ID Number</label>
                <input type="text" maxlength="8" minlength="8" name="id" required>
                <button type="submit" name="makeapp">CONTINUE</button>
            </form>
            <div class="vac-head"><h2>Here is a list of vacancies available at the moment</h2></div>
            <div class="vacancies-container">
                <?php 
                
                foreach ($vacancies as $vacancy) {
                    echo "<div class=\"pri-block\"><h1>".$vacancy->class;
                    echo "</h1><p>Slots left: ".$vacancy->amount;
                    echo "</p><p>Interview date: ".$vacancy->date."</p></div>";
                }

                 ?>
            <br>
        </div>
    </div>
</div>

@endsection