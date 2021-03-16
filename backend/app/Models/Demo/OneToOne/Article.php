<?php

namespace App\Models\Demo\OneToOne;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Article extends Model
{
    use DefaultDatetimeFormat;

    protected $attributes = array(
        'title' => '',
        'content' => ''
    );

    protected $fillable = [
        'title', 'content'
    ];

    public function seo()
    {
        return $this->hasOne(Seo::class);
    }
}
