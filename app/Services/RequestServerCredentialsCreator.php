<?php


namespace App\Services;

use App\Contracts\ServerCredentialsCreator;
use App\Models\Message;
use App\Models\ServerCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RequestServerCredentialsCreator implements ServerCredentialsCreator
{
    public function __construct(private ServerCredential $credential)
    {
    }

    public function create(Request $request, Message $message): ServerCredential
    {
        return $this->credential->create([
            'message_id' => $message->id,
            'ftp_login' => Crypt::encryptString($request->get('ftp_login')),
            'ftp_password'  =>  Crypt::encryptString($request->get('ftp_password'))
        ]);
    }
}
