<?php

namespace App\Http\Controllers\XControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\XModels\Phrase;

class PhraseController extends Controller
{
    public function create()
    {
        Phrase::firstOrCreate(request()->validate([
            'phrase'=> 'required',
        ]));
        redirect()->route('home');
    }

    public function list()
    {
        return Phrase::all()->sortByDesc('updated_at')->pluck('phrase');
    }
}
