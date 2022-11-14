<?php
 
namespace App\Http\Controllers\Admin;
 
use Backpack\PermissionManager\app\Http\Controllers\UserCrudController 
as PM_UserCrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends PM_UserCrudController
{
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        parent::setup();
    }

    public function setupListOperation()
    {
        parent::setupListOperation();
        $this->crud->removeColumn('permissions');
    }
}
