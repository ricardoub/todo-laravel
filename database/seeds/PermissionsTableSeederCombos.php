<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\User;

class PermissionsTableSeederCombos extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $comboIndex = new Permission();
    $comboIndex->name         = 'combo-index';
    $comboIndex->display_name = 'Combo List ';
    $comboIndex->description  = 'List system combos';
    $comboIndex->save();

    $comboShow = new Permission();
    $comboShow->name         = 'combo-show';
    $comboShow->display_name = 'Combo Show ';
    $comboShow->description  = 'Show system combos';
    $comboShow->save();

    $comboCreate = new Permission();
    $comboCreate->name         = 'combo-create';
    $comboCreate->display_name = 'Combo Create ';
    $comboCreate->description  = 'Create new system combo';
    $comboCreate->save();

    $comboEdit = new Permission();
    $comboEdit->name         = 'combo-edit';
    $comboEdit->display_name = 'Combo Edit ';
    $comboEdit->description  = 'Edit system combo';
    $comboEdit->save();

    $comboDelete = new Permission();
    $comboDelete->name         = 'combo-delete';
    $comboDelete->display_name = 'Combo Delete ';
    $comboDelete->description  = 'Delete system combo';
    $comboDelete->save();
  }
}
