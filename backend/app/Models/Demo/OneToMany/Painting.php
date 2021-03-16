<?php

namespace App\Models\Demo\OneToMany;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $attributes = array(
        'title' => '',
        'body' => ''
    );

    protected $fillable = [
        'title', 'body'
    ];

    protected $dates = [
        'completed_at'
    ];

    public function painter()
    {
        return $this->belongsTo(Painter::class);
    }
}
