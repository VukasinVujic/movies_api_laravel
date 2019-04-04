<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','director','imageUrl','duration',
        'releaseDate','genre'
    ];

    public static function filter($query, $request) {
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->get('title') . "%");
        return $query;
            
        } else {
            return Movie::all();
        }
    }

   

}
