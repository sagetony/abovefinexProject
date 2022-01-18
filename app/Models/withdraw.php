<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */       
   protected $fillable = [
       'withdraw_id',
       'username',
       'user_id',
       'amount',
       'coin',
       'type_withdraw',
       'wallet_address',
       'status',
   ];
      
}
