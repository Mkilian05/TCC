<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        if (!empty(config('app.sysadmin_role'))) {
            $superAdmin = Role::create(['name' => config('app.sysadmin_role'), 'description' => 'Administrador do Sistema']);
        }

        Permission::create(['name' => 'cria-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'delete-usuario']);
        Permission::create(['name' => 'edit-usuario']);
        Permission::create(['name' => 'view-post-admin']);
        Permission::create(['name' => 'view-admin']);
        Permission::create(['name' => 'view-post']);


        Permission::create(['name' => 'votacao']);


        $editor = Role::create(['name' => 'editor', 'description' => 'Editor de Posts']);

        $editor->givePermissionTo('cria-post');
        $editor->givePermissionTo('edit-post');
        $editor->givePermissionTo('delete-post');
        $editor->givePermissionTo('view-admin');
        $editor->givePermissionTo('view-post-admin');

        $usuario = Role::create(['name' => 'comum', 'description' => 'Usuário Comum']);

        $usuario->givePermissionTo('view-post');
        $usuario->givePermissionTo('votacao');
    }
}
