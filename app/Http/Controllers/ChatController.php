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

        $session_id = session()->get('id');
        // dd($session_id);
        $distinctedData = DB::table('chats')
            ->where('chats.recievers_id', session()->get('id'))
            ->orWhere('chats.senders_id', session()->get('id'))
            ->where('chats.senders_id', session()->get('id'))
            ->orWhere('chats.recievers_id', session()->get('id'))
            ->distinct()
            ->get('senders_id');

        $userData = DB::table('chats')
            ->join('users', function ($join) {
                $join->on(DB::raw('find_in_set(chats.recievers_id, users.id)'), DB::raw('find_in_set(chats.senders_id, users.id)'));
            })
            ->join('doctors', function ($join) {
                $join->on('chats.recievers_id', '=', 'doctors.doctors_id')->orOn('chats.senders_id', '=', 'doctors.doctors_id');
            })
            ->join('patients', function ($join) {
                $join->on('chats.recievers_id', '=', 'patients.patients_id')->orOn('chats.senders_id', '=', 'patients.patients_id');
            })
            ->join('patients_profile_pictures', function ($join) {
                $join->on('chats.recievers_id', '=', 'patients_profile_pictures.patients_id')->orOn('chats.senders_id', '=', 'patients_profile_pictures.patients_id');
            })
            ->join('doctors_profile_pictures', function ($join) {
                $join->on('chats.recievers_id', '=', 'doctors_profile_pictures.doctors_id')->orOn('chats.senders_id', '=', 'doctors_profile_pictures.doctors_id');
            })
            ->where('chats.recievers_id', session()->get('id'))
            ->orWhere('chats.senders_id', session()->get('id'))
            ->select('chats.message_id','chats.senders_id', 'chats.recievers_id', 'chats.message', 'chats.file', 'chats.is_seen', 'chats.is_deleted', 'users.email', 'users.role', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name', 'doctors_profile_pictures.profile_picture', 'patients_profile_pictures.patients_profile_picture')

            // ->where('chats.senders_id', 'chats.senders_id')
            //->groupBy('message_id')
            //->orderBy('DESC')
            ->orderBy('message_id', 'DESC')
         //->distinct('message_id')
        //->select(DB::raw(1))
        ->get()->unique('message_id');
        
            //->select('chats.message_id', 'chats.senders_id', 'chats.recievers_id', 'chats.message', 'chats.file', 'chats.is_seen', 'chats.is_deleted', 'users.email', 'users.role', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name', 'doctors_profile_pictures.profile_picture', 'patients_profile_pictures.patients_profile_picture');
            

        //$select_group = $userData->first();


        //$select_group = $userData->first();

        return json_encode(array('data' => $userData, 'session_id' => session()->get('id'), 'distinctedData' => $distinctedData));
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
            ->join('users', function ($join) {
                $join->on(DB::raw('find_in_set(chats.recievers_id, users.id)'), DB::raw('find_in_set(chats.senders_id, users.id)'));
            })
            ->join('doctors', function ($join) {
                $join->on('chats.recievers_id', '=', 'doctors.doctors_id')->orOn('chats.senders_id', '=', 'doctors.doctors_id');
            })
            ->join('patients', function ($join) {
                $join->on('chats.recievers_id', '=', 'patients.patients_id')->orOn('chats.senders_id', '=', 'patients.patients_id');
            })
            ->join('patients_profile_pictures', function ($join) {
                $join->on('chats.recievers_id', '=', 'patients_profile_pictures.patients_id')->orOn('chats.senders_id', '=', 'patients_profile_pictures.patients_id');
            })
            ->join('doctors_profile_pictures', function ($join) {
                $join->on('chats.recievers_id', '=', 'doctors_profile_pictures.doctors_id')->orOn('chats.senders_id', '=', 'doctors_profile_pictures.doctors_id');
            })
            ->where('chats.senders_id', $request->senders_id)
            ->orWhere('chats.recievers_id', $request->senders_id)
            ->where('chats.senders_id', session()->get('id'))
            ->orWhere('chats.recievers_id', session()->get('id'))
            ->select('chats.*', 'users.email', 'patients_profile_pictures.patients_profile_picture', 'doctors_profile_pictures.profile_picture', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name')
            ->get();

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function edit(chats $chats)
    {
        
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
