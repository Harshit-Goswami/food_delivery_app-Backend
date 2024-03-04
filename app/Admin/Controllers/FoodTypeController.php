<?php

namespace App\Admin\Controllers;

use App\Models\FoodType;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Tree;

class FoodTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Food Type';
    public function index(Content $content)
    {
        $tree = new Tree(new FoodType);

        return $content
            ->header('Food Type')
            ->body($tree);
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(FoodType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('order', __('Order'));
        $show->field('created_at', __('Created_at'));
        $show->field('updated_at', __('Updated_at'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FoodType());
        $form->select('parent_id', __('Parent Category'))->options((new FoodType())::selectOptions());
        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->number('order', __('Order'))->default(1);
        return $form;
    }
}
