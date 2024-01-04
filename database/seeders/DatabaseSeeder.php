<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Rangga Raditya',
      'email' => 'developer@site.dev',
      'password' => bcrypt('secret'),
    ]);

    $this->call([
      KaryawanSeeder::class,
      CutiSeeder::class,
    ]);
  }
}
