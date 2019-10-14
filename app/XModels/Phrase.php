<?php

namespace App\XModels;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $table = 'phrases';

    protected $fillable = [
        'phrase'
    ];
}
