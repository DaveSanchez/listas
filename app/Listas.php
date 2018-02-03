<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Listas extends Model
{
    //
    protected $fillable = [
        'titulo',
        'fecha',
        'observaciones'
    ];    

}
