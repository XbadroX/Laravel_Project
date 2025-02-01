<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{

    use HasFactory, Notifiable,HasApiTokens;

    protected $fillable = [
        'Gname',
        'Gdescription',
        'game_chars_id',
    ];

    
    public function GameChar(){
        return $this->belongsTo(GameChar::class);

    }

}
