<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //asi deberia dar pero no se pudo 
        //$this->call(ProductsTableSeeder::class);
        //entonces coloque el factory directamente en databaseSeeder; 
        factory(App\Product::class, 80)->create();
    }
}
