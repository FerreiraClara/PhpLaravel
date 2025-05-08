<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use App\Models\Season;
// use App\Models\Episode;

class Serie extends Model
{
    use HasFactory;
    
     protected $guardad = ['id'];

     protected $fillable = [
        'nome',
     ];

     protected $appends = ['links'];

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

    public function links():Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/series/{$this->id}"
                ],
                [
                    'rel' => 'seasons',
                    'url' => "/api/series/{$this->id}/season"
                ],
                [
                    'rel' => 'episodes',
                    'url' => "/api/series/{$this->id}/episodes"
                ]
            ],
        );
    }
}
