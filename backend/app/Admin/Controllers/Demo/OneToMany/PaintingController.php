<?php

namespace App\Admin\Controllers\Demo\OneToMany;

use App\Models\Demo\OneToMany\Painting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaintingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Painting';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Painting());

        $grid->id('ID')->sortable();

        $grid->column('painter.username')->editable();
        $grid->column('title', 'Заголовок')->editable();
        $grid->column('completed_at', 'Дата')->editable();

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
        $show = new Show(Painting::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Painting());

        $form->text('title');
        $form->image('body');
        $form->datetime('completed_at');

        return $form;
    }
}
