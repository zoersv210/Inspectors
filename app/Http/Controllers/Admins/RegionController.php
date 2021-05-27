<?php

namespace App\Http\Controllers\Admins;

use App\Models\Region;
use Appus\Admin\Details\Details;
use Appus\Admin\Http\Controllers\AdminController;
use Appus\Admin\Form\Form;
use Appus\Admin\Table\Table;

class RegionController extends AdminController
{

    public function grid(): Table
    {
        $table = new Table(new Region());

        $table->setSubtitle('Regions')
            ->defaultSort('updated_at', 'desc');

        $table->column('id', '#')->sortable(true);
        $table->column('name', 'Name')->sortable(true);
        $table->column('text', 'Text')->sortable(true);


        $table->editAction()
            ->route('regions.edit')
            ->field('region');

        $table->deleteAction()->disabled(true);
        $table->disableMultiDelete();

        $table->css(['/css/region_tab.css']);

        return $table;
    }

    public function details(): Details
    {
        $details = new Details(new Region());

        $details->field('id', 'ID');
        $details->field('name', 'Name');
        $details->field('text', 'Text');

        $details->viewPrepend('button.back', ['route' => 'regions.index']);

        return $details;
    }

    public function form(): Form
    {
        $form = new Form(new Region());

        $form->string('name', 'Name')->rules('required');
        $form->text('text', 'Text');


        $form->redirectWhenCreated('regions.index');
        $form->redirectWhenUpdated('regions.index');

        $form->viewPrepend('button.back', ['route' => 'regions.index']);

        return $form;
    }
}
