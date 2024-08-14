<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;
use App\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','Admin')->first();
        if(!$role){
            $role = new Role;
            $role->name = 'Admin';
            $role->save();
        }

        $user = User::where('username','admin')->first();
        if(!$user){
            $user = new User;
            $user->id       = Uuid::generate(5,'1', Uuid::NS_DNS);
            $user->role_id  = $role->id;
            $user->fullname = 'Admin';
            $user->username = 'admin';
            $user->email    = 'admin@mail.com';
            $user->password = bcrypt('123456');
            $user->save();
        }
    }
}
