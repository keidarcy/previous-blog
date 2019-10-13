<?php

namespace App\XModels;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'words';

    protected $fillable = [
        'word'
    ];
}
