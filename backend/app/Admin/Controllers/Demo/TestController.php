<?php

namespace App\Admin\Controllers\Demo;

use App\Models\Demo\Test;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class TestController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Test';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Test());



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
        $show = new Show(Test::findOrFail($id));



        return $show;
    }

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function form()
    {

        $form = new Form(new Test());


        $form->tab('inputs', function($form) {
            $form
                ->text('text')
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->textarea('textarea')
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->radio('radio_str')
                ->options( Test::$humanStr )
                ->default(Test::STRING_FIRST)
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->radio('radio_int')
                ->options( Test::$humanInt )
                ->default(Test::INT_SECOND)
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->radio('radio_bool')
                ->options( Test::$humanBool )
                ->default(Test::BOOL_TRUE)
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->checkbox('checkbox_str')
                ->options( Test::$humanStr )
                ->default([Test::STRING_FIRST, Test::STRING_SECOND])
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->select('select_str')
                ->options( Test::$humanStr )
                ->default(Test::STRING_FIRST)
                ->help('help...')
                ->placeholder('Please input...')
            ;

            $form
                ->select('select_int')
                ->options( Test::$humanInt )
                ->default(Test::INT_DEFAULT)
                ->help('help...')
                ->placeholder('Please input...')
            ;
        });


        /* IMAGES & FILES */

        $form->tab('images & files', function($form) {
            $form
                ->image('image')
                ->help('Изображение ужмется до 900px по ширине')
                ->uniqueName()
                ->resize(900, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->thumbnail(Test::$imageThumbnails)
            ;

            $form
                ->file('file')
                ->help('doc,pdf')
                ->uniqueName()
                ->rules('mimes:doc,pdf')
            ;

            $form
                ->multipleImage('multiple_images')
                ->removable()
                ->uniqueName()
                ->resize(900, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->thumbnail(Test::$imageThumbnails)
            ;
        });

        return $form;
    }
}
