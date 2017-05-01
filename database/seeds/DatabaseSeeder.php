<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(UsersTableSeeder::class);

    $this->call(RolesTableSeeder::class);
    $this->call(PermissionsTableSeederUsers::class);
    $this->call(PermissionsTableSeederTodos::class);
    $this->call(PermissionsTableSeederCombos::class);
    $this->call(AclSeeder::class);

    $this->call(CombosTableSeeder::class);

    $this->call(TodosTableSeeder::class);
  }
}
