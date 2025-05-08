<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
 
    protected $guardad = ['id'];

    protected $fillable = ['number'];

    //declarando como falso porque não foi configurado no banco, diferente das series e episodios
    public $timestamps = false;

    protected $casts = [
        'watched' => 'boolean'
    ];
}
