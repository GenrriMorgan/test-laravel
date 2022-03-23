<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'ticket_id',
    ];

    public function server_credentials()
    {
        return $this->hasOne(ServerCredential::class);
    }
}