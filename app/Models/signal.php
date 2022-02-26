<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */           
    protected $fillable = [
        'signalID',
        'Message',
        'T2',
        'SL',
        'entry',
        'currencypairs',
        'order',
        'status',
       
    ];

}
