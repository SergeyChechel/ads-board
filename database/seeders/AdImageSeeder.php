<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdImage;

class AdImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ads = Ad::all();
    
        foreach ($ads as $ad) {
            $numImages = mt_rand(1, 10);
    
            AdImage::factory($numImages)->create([
                'ad_id' => $ad->id,
            ]);
        }
    }
    
}
