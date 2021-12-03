<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use App\Http\Requests\StoreBirthCertificateRequest;
use App\Http\Requests\UpdateBirthCertificateRequest;

class BirthCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birthCertificateNumber = BirthCertificate::when(request('birth_certificate_number'), function ($query) {
            $query->where('birth_certificate_registration_number', 'like', request('birth_certificate_number') . '%');
        })->first();
        if ($birthCertificateNumber) {
            return response()->json([
                'success' => $birthCertificateNumber,
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
     * @param  \App\Http\Requests\StoreBirthCertificateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBirthCertificateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BirthCertificate  $birthCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(BirthCertificate $birthCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BirthCertificate  $birthCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(BirthCertificate $birthCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBirthCertificateRequest  $request
     * @param  \App\Models\BirthCertificate  $birthCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBirthCertificateRequest $request, BirthCertificate $birthCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BirthCertificate  $birthCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(BirthCertificate $birthCertificate)
    {
        //
    }
}
