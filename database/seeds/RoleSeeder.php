<?php

use Illuminate\Database\Seeder;

use App\Entities\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'Admin')->first();
        if(!$role){
            $role = new Role;
            $role->name   = 'Admin';
            $role->save();
        }

        $role = Role::where('name', 'Merchant')->first();
        if(!$role){
            $role = new Role;
            $role->name   = 'Merchant';
            $role->save();
        }
    }
}
