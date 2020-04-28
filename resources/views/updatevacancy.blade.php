@extends('layouts.dashboard')

@section('babycard')

<style type="text/css">
    .tcard{
        width: 77%;
        margin-top: 30px;
        margin-left: 222px;
    }
    form{
        bottom: 29%;
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
    table{
        background-color: rgba(222,222,222,0.8);
    }
    th,td{
        padding: 30px;
        min-width: 111px;
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

<div class="tcard">
    <form action="{{ url('vacancy') }}" method="post">
        @csrf

        <h1>UPDATE VACANCIES</h1>
        @if(\Session::has('success'))
                <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                </div>
                @endif
        <label for="class">Class: </label>
        <select id="class" name="class">
            <option>PP1</option>
            <option>PP2</option>
            <option>CLASS 1</option>
            <option>CLASS 2</option>
            <option>CLASS 3</option>
            <option>CLASS 4</option>
            <option>CLASS 5</option>
            <option>CLASS 6</option>
            <option>CLASS 7</option>
            <option>CLASS 8</option>
        </select>
        <label for="amount">Amount: </label>
        <input type="text" name="amount" id="amount">
        <br>
        <label for="date">Interview Date: </label>
        <input type="date" name="date" id="date">
        <button type="submit">UPDATE</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Class</th>
            <th>Vacancies</th>
            <th>Interview Date</th>
        </tr>
        <?php 

        $vacancies = DB::table('vacancies')->get();

        foreach ($vacancies as $vacancy) {
            echo "<tr><td>".$vacancy->id;
            echo "</td><td>".$vacancy->class;
            echo "</td><td>".$vacancy->amount;
            echo "</td><td>".$vacancy->date."</td></tr>";
        }

     ?>
    </table>
</div>

@endsection