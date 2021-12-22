<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class prescriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'patients_id',
        'first_name',
        'doctors_id',
        'appointment_id'
    ];

    public function testData()
    {

    $obj =
        prescriptions::join('users', 'prescriptions.patients_id', '=', 'users.id')
            ->where('is_archive', 0)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'))
            ->select('prescriptions.*', 'users.*')->get();

            $arr = array();
        foreach ($obj as $ob) {
            $array = [
                'id' => $ob->id,
                'patients_id' => $ob->patients_id,
                'first_name' => patient::where('patients_id', $ob->patients_id)->first()->first_name,
                'doctors_id' => $ob->doctors_id,
                'appointment_id' => $ob->appointment_id,
                'created_at' => $ob->created_at,
                'updated_at' => $ob->updated_at,
            ];
            $topic = new prescriptions($array);
            array_push($arr, $topic);
        }

        $query = $arr;

        // $topic = new prescriptions($arr);
        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'doctors_id');
        return $this->belongsTo(User::class, 'patients_id');
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class, 'doctors_id');
    }
    public function patient()
    {
        return $this->belongsTo(patient::class, 'patients_id');
    }

    public function medicines_for_patients()
    {
        return $this->hasMany(medicines_for_patients::class, 'prescriptions_id');
    }

    public function test()
    {
        return $this->hasMany(Test::class, 'prescriptions_id');
    }

    public function patients_problems()
    {
        return $this->hasMany(patients_problems::class, 'prescriptions_id');
    }

    public function referred_to()
    {
        return $this->hasMany(referred_to::class, 'prescriptions_id');
    }

    public function frequency()
    {
        return $this->hasMany(Frequency::class, 'prescriptions_id');
    }

    public function foodTime()
    {
        return $this->hasMany(FoodTime::class, 'prescriptions_id');
    }

    public function duration()
    {
        return $this->hasMany(Duration::class, 'prescriptions_id');
    }

}
