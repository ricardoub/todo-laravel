<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\User;

class PermissionsTableSeederUsers extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $userAdmin = new Permission();
    $userAdmin->name         = 'user-admin';
    $userAdmin->display_name = 'User Administrator';
    $userAdmin->description  = 'Create new user and edit existing users';
    $userAdmin->save();
  }
}
