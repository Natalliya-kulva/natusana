<?php

namespace App\Models\Demo\OneToOne;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    public $timestamps = false;
    protected $table = 'seo';

    protected $attributes = array(
        'title' => '',
        'description' => '',
        'keywords' => '',
    );

    protected $fillable = [
        'title', 'description', 'keywords'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
