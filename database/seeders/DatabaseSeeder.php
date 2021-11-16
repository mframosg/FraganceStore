<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Fragance;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Fragance::factory(18)->create();
  }
}
