<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rui Paulo Calei',
            'email' => 'ruic.dll@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $user2 = User::create([
            'name' => 'Marcelino Fernando Calei',
            'email' => 'marc.dll@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
