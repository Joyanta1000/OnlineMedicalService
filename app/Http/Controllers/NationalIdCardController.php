<?php

namespace App\Http\Controllers;

use App\Models\NationalIdCard;
use App\Http\Requests\StoreNationalIdCardRequest;
use App\Http\Requests\UpdateNationalIdCardRequest;

class NationalIdCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nationalIdCard = NationalIdCard::when(request('nid'), function ($query) {
            $query->where('nid',request('nid'));
        })->first();
        if ($nationalIdCard) {
            return response()->json([
                'success' => $nationalIdCard,
            ]);
        }
        return response()->json([
            'failed' => 'Failed to find National Id Card',
        ]);
        
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
     * @param  \App\Http\Requests\StoreNationalIdCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNationalIdCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalIdCard  $nationalIdCard
     * @return \Illuminate\Http\Response
     */
    public function show(NationalIdCard $nationalIdCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalIdCard  $nationalIdCard
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalIdCard $nationalIdCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNationalIdCardRequest  $request
     * @param  \App\Models\NationalIdCard  $nationalIdCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNationalIdCardRequest $request, NationalIdCard $nationalIdCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalIdCard  $nationalIdCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(NationalIdCard $nationalIdCard)
    {
        //
    }
}
