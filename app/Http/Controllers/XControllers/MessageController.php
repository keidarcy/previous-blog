<?php

namespace App\Http\Controllers\XControllers;

use Illuminate\Http\Request;
use App\XModels\Message;
use App\Http\Controllers\Controller;
use App\Mail\MessageCreated;
use App\Mail\MessageToMe;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function create(Request $request)
    {

        // validation will return a exact array query
        Message::firstOrCreate(request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]));

        Mail::to($request->email)->send(new MessageCreated($request));
        Mail::to('keidarcy.1015@gmail.com')->send(new MessageToMe($request));
        
        return redirect()->route('about')->with('status', config('frontend.message.sent'));
    }
}
