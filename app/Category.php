<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [ 'category_id', 'name', 'count', 'price', 'description'];

    public function categoryItems()
    {
        return $this->hasMany(Item::class);
    }

}
