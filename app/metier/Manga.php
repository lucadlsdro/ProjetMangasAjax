<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Manga extends Model{
    protected $table = 'manga';
    protected $primaryKey = 'id_manga';
    public $timestamps = false;
    protected $fillable = [
        'id_manga',
        'id_dessinateur',
        'id_scenariste',
        'id_genre',
        'prix',
        'titre',
        'couverture',
        ''
    ];
}
