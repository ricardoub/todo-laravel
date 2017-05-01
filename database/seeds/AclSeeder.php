<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\User;

class AclSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /*
     * ROLES
     */

    $todoRole         = Role::where('name', '=', 'todo')->first();
    $todoCommonRole   = Role::where('name', '=', 'todo-common')->first();
    $todoAdvancedRole = Role::where('name', '=', 'todo-advanced')->first();

    $registerRole         = Role::where('name', '=', 'register')->first();
    $registerCommonRole   = Role::where('name', '=', 'register-common')->first();
    $registerAdvancedRole = Role::where('name', '=', 'register-advanced')->first();

    $adminRole = Role::where('name', '=', 'admin')->first();
    /*
     * PERMISSIONS
     */

    // todoRole
    $todoIndex   = Permission::where('name', '=', 'todo-index')->first();
    $todoShow    = Permission::where('name', '=', 'todo-show')->first();
    $todoCreate  = Permission::where('name', '=', 'todo-create')->first();
    $todoEdit    = Permission::where('name', '=', 'todo-edit')->first();
    $todoDelete  = Permission::where('name', '=', 'todo-delete')->first();
    $todoOwner   = Permission::where('name', '=', 'todo-owner')->first();
    $todoAdmin   = Permission::where('name', '=', 'todo-admin')->first();

    // userRole
    $userIndex   = Permission::where('name', '=', 'user-index')->first();
    $userShow    = Permission::where('name', '=', 'user-show')->first();
    $userAdmin   = Permission::where('name', '=', 'user-admin')->first();

    // comboRole
    $comboIndex  = Permission::where('name', '=', 'combo-index')->first();
    $comboShow   = Permission::where('name', '=', 'combo-show')->first();
    $comboCreate = Permission::where('name', '=', 'combo-create')->first();
    $comboEdit   = Permission::where('name', '=', 'combo-edit')->first();
    $comboDelete = Permission::where('name', '=', 'combo-delete')->first();

    /*
     * ACL
     */

    $todoRole->attachPermissions(
      array($todoIndex, $todoShow));
    $todoCommonRole->attachPermissions(
      array($todoCreate, $todoEdit, $todoDelete));
    $todoAdvancedRole->attachPermissions(
      array($todoOwner));

    $registerRole->attachPermissions(
      array(
        $comboIndex, $comboShow,
        $userIndex, $userShow));
    $registerCommonRole->attachPermissions(
      array(
        $comboCreate, $comboEdit));
    $registerAdvancedRole->attachPermissions(
      array(
        $comboDelete));

    $adminRole->attachPermissions(
      array(
        $todoAdmin, $userAdmin));

    /*
     * USERS
     */

    $userCommon = User::where('name', '=', 'Usuario1')->first();
    $userCommon->roles()->attach($todoRole->id);
    $userCommon->roles()->attach($todoCommonRole->id);

    $userAdvanced = User::where('name', '=', 'Usuario2')->first();
    $userAdvanced->roles()->attach($todoRole->id);
    $userAdvanced->roles()->attach($todoCommonRole->id);
    //$userAdvanced->roles()->attach($todoAdvancedRole->id);
    $userAdvanced->roles()->attach($registerRole->id);

    $userAdmin = User::where('name', '=', 'Administrador')->first();
    $userAdmin->roles()->attach($todoRole->id);
    $userAdmin->roles()->attach($todoCommonRole->id);
    $userAdmin->roles()->attach($todoAdvancedRole->id);
    $userAdmin->roles()->attach($registerRole->id);
    $userAdmin->roles()->attach($registerCommonRole->id);
    $userAdmin->roles()->attach($registerAdvancedRole->id);
    $userAdmin->roles()->attach($adminRole->id);
  }
}
