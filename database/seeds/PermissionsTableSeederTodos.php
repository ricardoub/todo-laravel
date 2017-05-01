<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\User;

class PermissionsTableSeederTodos extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $todoIndex = new Permission();
    $todoIndex->name         = 'todo-index';
    $todoIndex->display_name = 'Todo List ';
    $todoIndex->description  = 'List your own tasks';
    $todoIndex->save();

    $todoShow = new Permission();
    $todoShow->name         = 'todo-show';
    $todoShow->display_name = 'Todo Show ';
    $todoShow->description  = 'Show your own tasks';
    $todoShow->save();

    $todoCreate = new Permission();
    $todoCreate->name         = 'todo-create';
    $todoCreate->display_name = 'Todo Create ';
    $todoCreate->description  = 'Create new todo posts';
    $todoCreate->save();

    $todoEdit = new Permission();
    $todoEdit->name         = 'todo-edit';
    $todoEdit->display_name = 'Todo Edit ';
    $todoEdit->description  = 'Edit your own tasks';
    $todoEdit->save();

    $todoDelete = new Permission();
    $todoDelete->name         = 'todo-delete';
    $todoDelete->display_name = 'Todo Delete ';
    $todoDelete->description  = 'Delete your own record of todos';
    $todoDelete->save();

    $todoOwner = new Permission();
    $todoOwner->name         = 'todo-owner';
    $todoOwner->display_name = 'Todo Owner';
    $todoOwner->description  = 'Change owner of your own record of todos';
    $todoOwner->save();

    $todoAdmin = new Permission();
    $todoAdmin->name         = 'todo-admin';
    $todoAdmin->display_name = 'Todo Admin';
    $todoAdmin->description  = 'Admin all record of todos';
    $todoAdmin->save();
  }
}
