<?php

namespace App\Admin\Controllers\Demo\ManyToMany;

use App\Admin\Selectable\Demo\Attributes;
use App\Models\Demo\ManyToMany\Attribute;
use App\Models\Demo\ManyToMany\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->id('ID')->sortable();
        $grid->column('title', 'Заголовок')->editable();

//        $grid->column('attributes')->display(function ($attributes){
//            $attributes = array_map(function ($attribute) {
//                return "<span class='label label-success'>{$attribute['title']}</span>";
//            }, $attributes);
//
//            return join('&nbsp;', $attributes);
//        });

        $grid->column('attributes')->belongsToMany(Attributes::class);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->tab('Продукт', function($form) {
            $form
                ->text('title', 'Заголовок')
                ->placeholder('Please input...')
            ;
        });

        $form->tab('Атрибуты', function($form) {
//            $form->multipleSelect('attributes', 'Атрибуты')->options(Attribute::all()->pluck('title','id'));
//            $form->checkbox('attributes','Атрибуты')->options(Attribute::all()->pluck('title','id'));
            $form->belongsToMany('attributes', Attributes::class, 'Атрибуты');
        });

        return $form;
    }
}
