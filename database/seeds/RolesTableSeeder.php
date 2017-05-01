<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $adminRole = new Role();
    $adminRole->name         = 'admin';
    $adminRole->display_name = 'Administrator';
    $adminRole->description  = 'User is allowed to manage and edit other users and todos'; // optional
    $adminRole->save();

    $todoRole = new Role();
    $todoRole->name         = 'todo';
    $todoRole->display_name = 'TODOs list';
    $todoRole->description  = 'User is allowed to (list, show) on their own TODOs'; // optional
    $todoRole->save();

    $todoCommonRole = new Role();
    $todoCommonRole->name         = 'todo-common';
    $todoCommonRole->display_name = 'TODOs create/edit'; // optional
    $todoCommonRole->description  = 'User is allowed to (create new, edit their own) TODOs'; // optional
    $todoCommonRole->save();

    $todoAdvancedRole = new Role();
    $todoAdvancedRole->name         = 'todo-advanced';
    $todoAdvancedRole->display_name = 'TODOs delete/change owner'; // optional
    $todoAdvancedRole->description  = 'User is allowed to (delete, change the owner) on their own TODOs.'; // optional
    $todoAdvancedRole->save();

    $registerRole = new Role();
    $registerRole->name         = 'register';
    $registerRole->display_name = 'CADASTROs list';
    $registerRole->description  = 'User is allowed to (list, show) SYSTEM REGISTERS'; // optional
    $registerRole->save();

    $registerCommonRole = new Role();
    $registerCommonRole->name         = 'register-common';
    $registerCommonRole->display_name = 'CADASTROs create/edit'; // optional
    $registerCommonRole->description  = 'User is allowed to (create new, edit) SYSTEM REGISTERS'; // optional
    $registerCommonRole->save();

    $registerAdvancedRole = new Role();
    $registerAdvancedRole->name         = 'register-advanced';
    $registerAdvancedRole->display_name = 'CADASTROs delete/change owner'; // optional
    $registerAdvancedRole->description  = 'User is allowed to (delete) SYSTEM REGISTERS'; // optional
    $registerAdvancedRole->save();
  }
}
