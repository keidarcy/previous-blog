<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\XModels\Word;

class WordController extends Controller
{
    public function create()
    {
        Word::firstOrCreate(request()->validate([
            'word'=> 'required',
        ]));
        redirect()->route('home');
    }
}
