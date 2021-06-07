<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "admin", "slug" => "admin"]);
        Role::create(["name" => "manager", "slug" => "manager"]);
    }
}
