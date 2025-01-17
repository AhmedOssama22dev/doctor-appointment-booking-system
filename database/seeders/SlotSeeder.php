<?php

namespace Database\Seeders;

use Database\Factories\SlotFactory;
use Illuminate\Database\Seeder;
use App\Modules\Availability\Models\Slot;

class SlotSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SlotFactory::new()->count(10)->create();
    }
}
