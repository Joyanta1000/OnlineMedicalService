<?php

namespace App\Http\Controllers;

use App\Models\VisitorsLocation;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class WebsiteController extends Controller
{
    public function index()
    {
        $userIp = request()->ip();
        // // $locationData = \Location::get($userIp);
        $data = Location::get();
        // dd($data);

        VisitorsLocation::create([
            'ip_address' => json_encode($data),
        ]);

        return view('website.index');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
