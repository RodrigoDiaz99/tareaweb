<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $super = User::create([
            'name' => 'Rodrigo Diaz',
            'email' => 'diaz-rodrigo@hotmail.com',
            'password' => Hash::make('sondeo23')
        ]);
        $super->assignRole('Super-Admin');

      
      
    }
}
