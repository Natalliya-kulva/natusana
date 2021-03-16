<?php

namespace App\Admin\Controllers\Demo\OneToOne;

use App\Models\Demo\OneToOne\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->id('ID')->sortable();
        $grid->column('title', 'Заголовок')->editable();
        $grid->column('seo.title', 'SEO Title')->editable();
        $grid->column('created_at', 'Создано')->datetime();

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
        $show = new Show(Article::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->tab('Статья', function($form) {
            $form
                ->text('title', 'Заголовок')
                ->placeholder('Please input...')
            ;

            $form
                ->ckeditor('content', 'Контент')
            ;
        });

        $form->tab('Сео', function($form) {
            $form->text('seo.title', 'SEO Title');
            $form->text('seo.description', 'SEO Description');
            $form->text('seo.keywords', 'SEO Keywords');
        });

        return $form;
    }
}
