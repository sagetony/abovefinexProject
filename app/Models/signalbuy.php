<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signalbuy extends Model
{
    use HasFactory;

/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */           
    protected $fillable = [
        'signalpurchaseID',
        'userID',
        'username',
        'email',
        'referral',
        'signalplan',
        'phone',
        'amount',
        'status',
        'dayCounter',
       
    ];
}
