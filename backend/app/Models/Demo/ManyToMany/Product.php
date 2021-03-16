<?php

namespace App\Models\Demo\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $attributes = array(
        'title' => ''
    );

    protected $fillable = [
        'title'
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
