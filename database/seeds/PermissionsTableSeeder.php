<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run tcreatehe database seeds.
     *create
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios
        Permission::create([
            //segun las entidades se pone el slug
            //los usuario veran index
            'name' => 'Navegar Usuarios',
            'slug' => 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema'
        ]);
        Permission::create([
            'name' => 'Ver detalle de Usuarios',
            'slug' => 'users.show',
            'description' => 'Ver en detalle cada usuario del sistema'
        ]);
        Permission::create([
            'name' => 'Edicion de Usuarios',
            'slug' => 'users.edit',
            'description' => 'Editar cualquier dato de un usuario del sistema'
        ]);
        Permission::create([
            'name' => 'Navegar Usuarios',
            'slug' => 'users.destroy',
            'description' => 'Eliminar cualquier dato de un usuario del sistema'
        ]);

        

        //Roles de usuarios
        Permission::create([
            'name' => 'Navegar roles',
            //segun las entidades se pone el slug
            //los usuario veran index
            'slug' => 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema'
        ]);
        Permission::create([
            'name' => 'Ver detalle de rol',
            'slug' => 'roles.show',
            'description' => 'Ver en detalle cada rol del sistema'
        ]);
        Permission::create([
            'name' => 'Creacion de roles',
            'slug' => 'roles.create',
            'description' => 'Editar cualquier dato de un rol del sistema'
        ]);
        Permission::create([
            'name' => 'Edicion de roles',
            'slug' => 'roles.edit',
            'description' => 'Editar cualquier dato de un rol del sistema'
        ]);
        Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar cualquier rol del sistema'
        ]);



        //Products
        Permission::create([
            'name' => 'Navegar productos',
            //segun las entidades se pone el slug
            //los usuario veran index
            'slug' => 'products.index',
            'description' => 'Lista y navega todos los productos del sistema'
        ]);
        Permission::create([
            'name' => 'Ver detalle de producto',
            'slug' => 'products.show',
            'description' => 'Ver en detalle cada producto del sistema'
        ]);
        Permission::create([
            'name' => 'Creacion de productos',
            'slug' => 'products.create',
            'description' => 'Crear un producto del sistema'
        ]);
        Permission::create([
            'name' => 'Edicion de productos',
            'slug' => 'products.edit',
            'description' => 'Editar cualquier dato de un producto del sistema'
        ]);
        Permission::create([
            'name' => 'Eliminar producto',
            'slug' => 'products.destroy',
            'description' => 'Eliminar cualquier producto del sistema'
        ]);
    }
}
