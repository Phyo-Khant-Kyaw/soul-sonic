<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =   User::create([
            'name' => 'Chaw',
            'profile' => 'images/user/customer.jpeg',
            'email' => 'chaw@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        $customer = User::create([
            'name' => 'pkk',
            'profile' => 'images/user/customer.jpeg',
            'email' => 'pkk@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $customer->assignRole('member');
    }
}
