<?php

namespace Database\Seeders;

use App\Models\HeadlineTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadlineTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'our specials',
            'services',
            'packages',
            'statistics',
            'testimonials',
            'our clients',
            'contact us'
        ];

        foreach ($sections as $key) {
            HeadlineTranslation::create(['section' => $key]);
        }
    }
}