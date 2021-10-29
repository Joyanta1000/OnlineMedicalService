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
        'senders_full_name',
        'message',
        'file',
        'message',
        'time',
        'is_seen',
        'is_deleted',

    ];
}
