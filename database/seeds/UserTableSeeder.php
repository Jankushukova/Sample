<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->fill([
            'password' => '11223344',

            'name' => 'admin',
            'email' => 'admin@mail.kz',
            'role_id' => 1
        ]);
        $admin->password = bcrypt($admin->password);
        $admin->save();

        $manager = new User();
        $manager->fill([
            'password' => '12345',
            'name' => 'manager1',
            'email' => 'manager1@mail.kz',
            'role_id' => 2
        ]);
        $manager->password=bcrypt($manager->password);
        $manager->save();
    }
}
