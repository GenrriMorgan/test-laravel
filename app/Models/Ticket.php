<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'uid',
        'user_id'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
