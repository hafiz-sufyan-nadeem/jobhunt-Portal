<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobCategory::create(['name' => 'Web Development']);
        JobCategory::create(['name' => 'Mobile Development']);
        JobCategory::create(['name' => 'UI/UX Design']);
        JobCategory::create(['name' => 'Graphic Design']);
        JobCategory::create(['name' => 'QA Engineer']);
        JobCategory::create(['name' => 'AI Engineer']);

    }
}
