<?php

namespace App\Admin\Controllers\Demo\OneToOne;

use App\Models\Demo\OneToOne\Article;
use App\Models\Demo\OneToOne\Seo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SeoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Seo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Seo());

        $grid->column('article.title', 'Заголовок статьи')->editable();
        $grid->column('title', 'SEO Title')->editable();
        $grid->column('description', 'SEO Description')->editable();
        $grid->column('keywords', 'SEO Keywords')->editable();

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
        $show = new Show(Seo::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Seo());

        $form->text('title', 'SEO Title');
        $form->text('description', 'SEO Description');
        $form->text('keywords', 'SEO Keywords');

        $form->select('article_id', 'Статья')->options(Article::all()->pluck('title','id'));

        return $form;
    }
}
