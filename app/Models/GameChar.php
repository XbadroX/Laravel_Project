<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameChar extends Model
{
    use HasFactory, Notifiable,HasApiTokens;
    
    protected $fillable = [
        'Cname',
        'Cdescription',
    ];

    public function Game(){
        return $this->hasMany(Game::class);

    }
}
