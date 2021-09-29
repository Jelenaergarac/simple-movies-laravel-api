<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'director',
        'imageUrl',
        'duration',
        'releaseDate',
        'genre'
    ];
    public static function search($title=null){
        $query = self::query();
        if($title){
            $title = strtolower($title);
            $query->whereRaw('lower(title) like "%' . $title . '%"');
        }
        return $query;
    }
}
