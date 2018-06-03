<?php

namespace Pizzeria;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'image',
        'name',
        'type',
        'description',
        'price'
    ];
}
