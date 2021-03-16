<?php

namespace App\Models\Demo\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $attributes = array(
        'title' => ''
    );

    protected $fillable = [
        'title'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
