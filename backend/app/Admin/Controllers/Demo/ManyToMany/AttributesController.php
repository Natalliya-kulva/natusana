<?php

namespace App\Admin\Controllers\Demo\ManyToMany;

use App\Models\Demo\ManyToMany\Attribute;
use App\Models\Demo\ManyToMany\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AttributesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Attribute';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Attribute());

        $grid->id('ID')->sortable();
        $grid->column('title', 'Заголовок')->editable();

        $grid->column('products')->display(function ($products){
            $products = array_map(function ($product) {
                return "<span class='label label-success'>{$product['title']}</span>";
            }, $products);

            return join('&nbsp;', $products);
        });

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
        $show = new Show(Attribute::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Attribute());

        $form->tab('Атрибут', function($form) {
            $form
                ->text('title', 'Заголовок')
                ->placeholder('Please input...')
            ;
        });

        $form->tab('Товары', function($form) {
            $form->multipleSelect('products', 'Товары')->options(Product::all()->pluck('title','id'));
            $form->checkbox('products','Товары')->options(Product::all()->pluck('title','id'));
        });

        return $form;
    }
}
