<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    use HasFactory;

    protected $fillable = [
        'senders_id',
        'recievers_id',
        'message_id',
        'senders_full_name',
        'message',
        'file',
        'message',
        'time',
        'is_seen',
        'is_deleted',

    ];
    public function user()
    {
        return $this->belongsTo(User::class,'senders_id');
        return $this->belongsTo(User::class, 'recievers_id');
    }
    
}
