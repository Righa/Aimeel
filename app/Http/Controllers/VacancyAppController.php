<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use Redirect;
use DB;

class VacancyAppController extends Controller
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
        return view('vacancies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacancy = DB::table('vacancies')->where('class', $request->get('class'))->get();
        $ammt = $vacancy[0]->amount - 1;
        DB::table('vacancies')->where('id', $vacancy[0]->id)->update(['amount' => $ammt]);

        $application = new Application([
            'sname' => $request->get('name'),
            'class' => $request->get('class'),
            'phone' => $request->get('phone'),
            'idno' => $request->get('id')
        ]);
        $application->save();
        
        return redirect::to("vacancies")->with('success', 'Application sent successfully');
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
