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
    $this->call(AclSeeder::class);
    $this->call(TodosTableSeeder::class);
    $this->call(CombosTableSeeder::class);
  }
}
