<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use App\Http\Requests\StoreTestModelRequest;
use App\Http\Requests\UpdateTestModelRequest;

class TestModelController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function show(TestModel $testModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TestModel $testModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestModelRequest  $request
     * @param  \App\Models\TestModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestModelRequest $request, TestModel $testModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestModel  $testModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestModel $testModel)
    {
        //
    }
}
