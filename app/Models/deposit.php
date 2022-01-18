<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    use HasFactory;

 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */    
    protected $fillable = [
        'transaction_id',
        'userID',
        'username',
        'amount',
        'coin',
        'interest',
        'plan',
        'packages',
        'planAmount',
        'status',
        'dayCounter',
        'interestcap',
        'day',
       
    ];

}
