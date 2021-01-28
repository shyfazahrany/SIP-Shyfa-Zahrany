<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'file'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}