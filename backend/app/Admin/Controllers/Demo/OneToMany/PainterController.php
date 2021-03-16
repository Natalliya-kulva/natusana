<?php

namespace App\Admin\Controllers\Demo\OneToMany;

use App\Models\Demo\OneToMany\Painter;
use App\Models\Demo\OneToMany\Painting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PainterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Painter';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Painter());

        $grid->column('username', 'Painter Title')->editable();

        $grid->column('paintings')->display(function ($paintings){
            $paintings = array_map(function ($painting) {
                return "<span class='label label-success'>{$painting['title']}</span>";
            }, $paintings);

            return join('&nbsp;', $paintings);
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
        $show = new Show(Painter::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Painter());

        $form->text('username')->rules('required');
        $form->textarea('bio')->rules('required');

        $form->hasMany('paintings', function (Form\NestedForm $form) {
            $form->text('title');
            $form->image('body');
            $form->datetime('completed_at');
        });

        return $form;
    }
}
