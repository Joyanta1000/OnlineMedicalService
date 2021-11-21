<?php

namespace App\Http\Controllers;

use App\Models\prescriptions;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('PrescriptionController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function show(prescriptions $prescriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(prescriptions $prescriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prescriptions $prescriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(prescriptions $prescriptions)
    {
        //
    }
}
