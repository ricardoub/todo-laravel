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
        $adminRole = new Role();
        $adminRole->name         = 'admin';
        $adminRole->display_name = 'User Administrator'; // optional
        $adminRole->description  = 'User is allowed to manage and edit other users'; // optional
        $adminRole->save();

        $ownerRole = new Role();
        $ownerRole->name         = 'owner';
        $ownerRole->display_name = 'Todo owner'; // optional
        $ownerRole->description  = 'User is the owner of a given todo'; // optional
        $ownerRole->save();

        $createTodo = new Permission();
        $createTodo->name         = 'create-todo';
        $createTodo->display_name = 'Create Todo'; // optional
        // Allow a user to...
        $createTodo->description  = 'create new todo posts'; // optional
        $createTodo->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $adminRole->attachPermission($createTodo, $editUser);
        // equivalent to $adminRole->perms()->sync(array($createPost->id));

        $ownerRole->attachPermissions(array($createTodo));
        // equivalent to $ownerRole->perms()->sync(array($createPost->id, $editUser->id));

        $user = User::where('name', '=', 'Administrador')->first();

        // role attach alias
        //$user->attachRole($adminRole); // parameter can be an Role object, array, or id

        // or eloquent's original technique
        $user->roles()->attach($adminRole->id); // id only
    }
}
