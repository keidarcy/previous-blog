<?php

namespace App\Http\Controllers\XControllers;

use Illuminate\Http\Request;
use App\XModels\Message;
use App\Http\Controllers\Controller;

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
            
        return redirect()->route('about')->with('status', config('frontend.message.sent'));
    }
}
