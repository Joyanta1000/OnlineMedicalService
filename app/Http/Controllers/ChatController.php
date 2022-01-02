<?php

namespace App\Http\Controllers;

use App\Models\chats;
use App\Models\doctor;
use App\Models\doctors_profile_pictures;
use App\Models\patient;
use App\Models\patients_profile_picture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Spatie\Searchable\Search;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // var $pusher;
    // var $user;
    // var $chatChannel;

    // const DEFAULT_CHAT_CHANNEL = 'chat';

    // public function __construct()
    // {
    //     $this->pusher = App::make('pusher');
    //     $this->user = Session::get('id');
    //     $this->chatChannel = self::DEFAULT_CHAT_CHANNEL;
    // }

    public function index()
    {
        $session_id = session()->get('id');
        $ProfilePicture = (new Search())
            ->registerModel(doctors_profile_pictures::class, 'doctors_id')
            ->registerModel(patients_profile_picture::class, 'patients_id')
            ->perform($session_id)
            ->first();

        $Name = (new Search())
        ->registerModel(doctor::class, 'doctors_id')
        ->registerModel(patient::class, 'patients_id')
        ->perform($session_id)
        ->first();

            
        if (!empty($ProfilePicture->searchable->profile_picture)) {
            $ProPic = $ProfilePicture->searchable->profile_picture;
        } else if (!empty($ProfilePicture->searchable->patients_profile_picture)) {
            $ProPic = $ProfilePicture->searchable->patients_profile_picture;
        }

        $Name = $Name->searchable->first_name;
         //dd($ProPic, $Name);
        return view('chat.index', compact('ProPic', 'Name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactList()
    {
        $session_id = session()->get('id');
        $distinctedData = DB::table('chats')
            ->where('chats.recievers_id', session()->get('id'))
            ->orWhere('chats.senders_id', session()->get('id'))
            ->where('chats.senders_id', session()->get('id'))
            ->orWhere('chats.recievers_id', session()->get('id'))
            ->distinct()
            ->get('senders_id');
        if (!empty(request()->get('name'))) {
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
                ->select('chats.id', 'chats.created_at', 'chats.message_id', 'chats.senders_id', 'chats.recievers_id', 'chats.message', 'chats.file', 'chats.is_seen', 'chats.is_deleted', 'users.email', 'users.role', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name', 'doctors_profile_pictures.profile_picture', 'patients_profile_pictures.patients_profile_picture')
                ->where('doctors.first_name', 'like', '%' . request()->get('name') . '%')
                ->orWhere('patients.first_name', 'like', '%' . request()->get('name') . '%')
                ->latest('chats.created_at')
                ->orderBy('message_id', 'DESC')
                ->get()->unique('message_id');
        } else {
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
                ->select('chats.id', 'chats.created_at', 'chats.message_id', 'chats.senders_id', 'chats.recievers_id', 'chats.message', 'chats.file', 'chats.is_seen', 'chats.is_deleted', 'users.email', 'users.role', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name', 'doctors_profile_pictures.profile_picture', 'patients_profile_pictures.patients_profile_picture')
                ->latest('chats.created_at')
                ->orderBy('message_id', 'DESC')
                ->get()->unique('message_id');
        }
        return json_encode(array('data' => $userData, 'session_id' => session()->get('id'), 'distinctedData' => $distinctedData, 'name' => request()->get('name')));
    }

    public function chatData(Request $request)
    {
        $updateChat = "";
        
        if (!empty($request->get('patient_id')) && !empty($request->get('doctor_id'))){
            $return = chats::where('senders_id', $request->get('doctor_id'))
                ->where('recievers_id', $request->get('patient_id'))
                ->orWhere('senders_id', $request->get('patient_id'))
                ->where('recievers_id', $request->get('doctor_id'))
                ->orderBy('id', 'DESC')
                ->first();
            return redirect()->route('chat.index', ['id' => $return->id]);
        }
        $ids = chats::find($request->id);
        if ($ids->senders_id != session()->get('id')) {
            $updateChat = DB::table('chats')
                ->where('id', $ids->id)
                ->update(['is_seen' => 1]);
        }
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
            ->select('chats.*', 'users.email', 'patients_profile_pictures.patients_profile_picture', 'doctors_profile_pictures.profile_picture', 'doctors.first_name as doctors_first_name', 'patients.first_name as patients_first_name')
            ->where(['chats.message_id' => $ids->message_id])
            // ->orWhere(['chats.recievers_id' => $ids->senders_id , 'chats.senders_id' => $ids->recievers_id])
            // ->distinct('chats.id')
            
            // ->where('chats.senders_id', session()->get('id'))
            // ->orWhere('chats.recievers_id', session()->get('id'))
            
            // ->distinct('chats.id')
            ->get();
        $SendersProfilePicture = (new Search())
            ->registerModel(doctors_profile_pictures::class, 'doctors_id')
            ->registerModel(patients_profile_picture::class, 'patients_id')
            ->perform($ids->senders_id)
            ->first();
        $RecieversProfilePicture = (new Search())
            ->registerModel(doctors_profile_pictures::class, 'doctors_id')
            ->registerModel(patients_profile_picture::class, 'patients_id')
            ->perform($ids->recievers_id)
            ->first();
        return json_encode(array('data' => $messageData, 'seen' => $updateChat, 'SendersProfilePicture' => $SendersProfilePicture, 'RecieversProfilePicture' => $RecieversProfilePicture));
    }

    public function submitMsg(Request $request)
    {
        $code = Str::random(30);
        $extra_1 = Str::random(32);
        $mytime = Carbon::now();
$dateTime = $mytime->toDateTimeString();
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
                'time' => $dateTime,
            ]);
            return json_encode(array('data' => $insertChat));
        } else {
            $insertChat = chats::create([
                'message' => $request->message,
                'recievers_id' => $request->recievers_id,
                'senders_id' => session()->get('id'),
                'message_id' => $request->message_id,
                'time' => $dateTime,
            ]);
            return json_encode(array('data' => $insertChat));
        }
    }

    public function store(Request $request)
    {
        
    }

    public function show(chats $chats)
    {

    }

    public function edit(chats $chats)
    {

    }

    public function update(Request $request, chats $chats)
    {

    }

    public function destroy(chats $chats)
    {
        
    }
}
