<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class robot extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */           
    protected $fillable = [
        'robotID',
        'userID',
        'username',
        'email',
        'referral',
        'plan',
        'phone',
        'amount',
        'status',
        'daycounter',
        'broker',
        'tradingID',
        'tradingpassword',
       
    ];

}
