<?php

namespace App\Admin\Selectable\Demo;

use App\Models\Demo\ManyToMany\Attribute;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Attributes extends Selectable
{
    public $model = Attribute::class;

    public function make()
    {
        $this->column('id');
        $this->column('title');

        $this->filter(function (Filter $filter) {
            $filter->like('title');
        });
    }

    public static function display()
    {
        return function ($value) {
            if (is_array($value)) {
                return implode(', ', array_column($value,'title'));
            }
        };
    }
}
