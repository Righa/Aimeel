<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use DB;
use Redirect;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacancies = DB::table('vacancies')->get();

        foreach ($vacancies as $vacancy){
            $classs = $vacancy->class;

            if ($classs == $request->get('class')) {
                $amt = $vacancy->amount + $request->get('amount');
                DB::table('vacancies')->where('id', $vacancy->id)->update(['amount' => $amt]);
                return redirect::to("update")->with('success', 'Vacancies updated successfully');
            }

        }
        $vacancy = new Vacancy([
            'class' => $request->get('class'),
            'amount' => $request->get('amount'),
            'date' => $request->get('date'),
        ]);
        $vacancy->save();

        return redirect::to("update")->with('success', 'Vacancies added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
