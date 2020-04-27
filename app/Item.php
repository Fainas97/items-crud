<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'name', 'count', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryItems($id)
    {
        return $this->where('category_id', $id)->paginate(5);
    }
}
