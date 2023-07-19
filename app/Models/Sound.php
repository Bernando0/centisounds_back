<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Sound extends Model
{
    use HasFactory;
    protected $table = 'sounds';

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genreId', 'id');
    }
}
