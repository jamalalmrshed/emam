<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Offer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "offers";

    protected $fillable=['name','price','photo','details'];


    protected $hidden = ['password',
    'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;
}
