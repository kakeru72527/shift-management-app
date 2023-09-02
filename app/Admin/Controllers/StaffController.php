<?php

namespace App\Admin\Controllers;

use App\Models\Staff;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StaffController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Staff';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Staff());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('user_id', __('User id'));
        $grid->column('store_id', __('Store id'));
        $grid->column('role', __('Role'))->sortable();
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();
        $grid->column('deleted_at', __('Deleted at'))->sortable();

        $grid->filter(function($filter) {
            $filter->like('user_id', 'ユーザーID');
            $filter->like('store_id', '店舗ID');
            $filter->like('role', '役割');
            $filter->between('created_at', '登録日')->datetime();
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
        $show = new Show(Staff::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('store_id', __('Store id'));
        $show->field('role', __('Role'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Staff());

        $form->number('user_id', __('User id'));
        $form->number('store_id', __('Store id'));
        $form->text('role', __('Role'));

        return $form;
    }
}
