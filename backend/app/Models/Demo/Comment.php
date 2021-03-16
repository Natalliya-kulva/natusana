<?php

namespace App\Models\Demo;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Comment extends Model
{
    use DefaultDatetimeFormat;

    protected $attributes = array(
        'message' => '',
    );

    protected $fillable = [
        'message'
    ];

    public function tests()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }
}
