<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
// use App\Models\Season;
// use App\Models\Episode;

class Serie extends Model
{
    use HasFactory;
    
     protected $guardad = ['id'];

     protected $fillable = [
        'nome',
     ];

     public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public function episodes(): HasManyThrough
    {
        // tem muitos "episodios" atraves de (vai ver todos os episodios, de todas as temporadas )
        // return $this->hasManyThrough(Episode::class, Season::class);                             // não funcionou
        return $this->through('seasons')->has('episodes');
    }
}
