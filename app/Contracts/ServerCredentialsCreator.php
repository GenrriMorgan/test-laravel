<?php

namespace App\Contracts;

use App\Models\Message;
use App\Models\ServerCredential;
use Illuminate\Http\Request;

interface ServerCredentialsCreator
{
    public function create(Request $request, Message $message): ServerCredential;
}
