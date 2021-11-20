<?php

namespace App\Http\Controllers;

use App\Models\chats;
use App\Models\doctors_profile_pictures;
use App\Models\patients_profile_picture;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Spatie\Searchable\Search;

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
            ->select('chats.id', 'chats.message_id', 'chats.senders_id', 'chats.recievers_id', 'chats.message', 'chats.file', 'chats.is_seen', 'chats.is_deleted', 'users.email', 'users.role', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name', 'doctors_profile_pictures.profile_picture', 'patients_profile_pictures.patients_profile_picture')

            // ->where('chats.senders_id', 'chats.senders_id')
            //->groupBy('message_id')
            ->latest('chats.created_at')
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
            // ->orderBy('chats.created_at', 'DESC')
            ->get();
        //     $sendersId = $request->senders_id;
        //     $recieversId = session()->get('id');


        $SendersProfilePicture = (new Search())
            ->registerModel(doctors_profile_pictures::class, 'doctors_id')
            ->registerModel(patients_profile_picture::class, 'patients_id')
            ->perform($request->senders_id)
            ->first();

        $RecieversProfilePicture = (new Search())
            ->registerModel(doctors_profile_pictures::class, 'doctors_id')
            ->registerModel(patients_profile_picture::class, 'patients_id')
            ->perform($request->recievers_id)
            ->first();

        //  $DESC = $SendersProfilePicture->sortByDesc('id');
        //     $SendersProfilePicture =  doctors_profile_pictures::where('doctors_id', $sendersId)
        //     // I need this album if any of its user's name matches the given input
        //     ->orWhereHas('patients_profile_pictures', function ($q) use ($sendersId) {
        //         return $q->where('patients_id', $sendersId );
        //     })->get();

        // $RecieversProfilePicture =  doctors_profile_pictures::where('doctors_id', $recieversId)
        // // I need this album if any of its user's name matches the given input
        // ->orWhereHas('patients_profile_pictures', function ($q) use ($recieversId) {
        //     return $q->where('patients_id', $recieversId);
        // })->get();

        return json_encode(array('data' => $messageData, 'seen' => $updateChat, 'SendersProfilePicture' => $SendersProfilePicture, 'RecieversProfilePicture' => $RecieversProfilePicture));
    }

    public function submitMsg(Request $request)
    {
        $code = Str::random(30);
        $extra_1 = Str::random(32);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $code . '.' . $extra_1 . '.' . $file->getClientOriginalExtension();
            $file_path = public_path('/Chat_Files/');
            $file->move($file_path, $file_name);

            $insertChat = chats::create([
                'message' => $request->message,
                'file' => '/Chat_Files/' . $file_name,
                'recievers_id' => $request->recievers_id,
                'senders_id' => $request->senders_id,
                'message_id' => $request->message_id,
            ]);

            return json_encode(array('data' => $insertChat));
        } else {
            $insertChat = chats::create([
                'message' => $request->message,
                'recievers_id' => $request->recievers_id,
                'senders_id' => session()->get('id'),
                'message_id' => $request->message_id,
            ]);

            return json_encode(array('data' => $insertChat));
        }

        // dd('hey', request()->all());



        // $pharmacies_profile_picture = new pharmacies_profile_pictures;
        // $pharmacies_profile_picture->phermacies_id = $id;

        // $pharmacies_profile_picture->pharmacies_profile_picture = '/Pharmacies_Files/Pharmacies_Profile_Pictures/' . $profile_pictures_name;
        // $pharmacies_profile_picture->save();
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
