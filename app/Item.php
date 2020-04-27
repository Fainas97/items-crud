<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected $fillable = ['category_id', 'name', 'count', 'price', 'description'];

    public function itemCategory()
    {
        return $this->belongsTo(Category::class);
    }
}
