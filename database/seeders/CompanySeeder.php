<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create(['name' => '株式会社abc', 'address' => 'a県b市c区1-2-3']);
        Company::create(['name' => '株式会社def', 'address' => 'd県e市f区3-2-1']);
    }
}
