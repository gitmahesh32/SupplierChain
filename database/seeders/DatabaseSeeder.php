<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            SuppSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'xyz',
            'first_name'=>'xyz',
            'last_name'=>'lastz',
            'email' => 'test@example.com',
            'username'=>'xyz',
            'phone'=>'9999999999',
            'password' => Hash::make('12345678'),
        ]);
    }
}
