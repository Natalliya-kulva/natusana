<?php

namespace App\Models\Demo\OneToMany;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    protected $attributes = array(
        'username' => '',
        'bio' => ''
    );

    protected $fillable = [
        'username', 'bio'
    ];

    public function paintings()
    {
        return $this->hasMany(Painting::class);
    }
}
