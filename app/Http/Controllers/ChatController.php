<?php

namespace App\Http\Controllers;

use App\Models\chats;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactList()
    {
        $userData = DB::table('chats')
            ->join('users', 'chats.recievers_id', '=', 'users.id')
            ->join('doctors', 'chats.recievers_id', '=', 'doctors.doctors_id')
            ->join('patients', 'chats.senders_id', '=', 'patients.patients_id')
            ->join('patients_profile_pictures', 'chats.senders_id', '=', 'patients_profile_pictures.patients_id')
            ->where('chats.recievers_id', session()->get('id'))
            ->select('chats.*', 'users.email', 'patients_profile_pictures.patients_profile_picture', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name')
            ->get();
        //dd($userData);
        return json_encode(array('data' => $userData));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function chatData(Request $request)
    {
        $updateChat = DB::table('chats')
            ->where('id', $request->id)
            ->update(['is_seen' => 1]);

        $messageData = DB::table('chats')
            ->join('users', 'chats.recievers_id', '=', 'users.id')
            ->join('doctors', 'chats.recievers_id', '=', 'doctors.doctors_id')
            ->join('patients', 'chats.senders_id', '=', 'patients.patients_id')
            ->join('patients_profile_pictures', 'chats.senders_id', '=', 'patients_profile_pictures.patients_id')
            ->join('doctors_profile_pictures', 'chats.recievers_id', '=', 'doctors_profile_pictures.doctors_id')
            ->where('chats.id', $request->id)
            ->select('chats.*', 'users.email', 'patients_profile_pictures.patients_profile_picture', 'doctors_profile_pictures.profile_picture', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name')
            ->first();
        return json_encode(array('data' => $messageData));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function show(chats $chats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function edit(chats $chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chats $chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function destroy(chats $chats)
    {
        //
    }
}
