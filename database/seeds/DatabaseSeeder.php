<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'name' => 'Feria Tacna',
            'email' => 'feriatacna4@gmail.com',
            'password' => bcrypt('secret@@**7!!@#$4444feria!!'),
            'address' => '',
            'role' => 'Cliente'
        ]);
    }
}
