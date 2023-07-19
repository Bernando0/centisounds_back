<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteSound extends Model
{
    use HasFactory;
    protected $table = 'favoriteSounds';
    public function sound(){
        return $this->belongsTo(Sound::class);
    }
}
