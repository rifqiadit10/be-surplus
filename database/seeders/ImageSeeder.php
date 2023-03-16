<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed Images table
        for ($i = 0; $i < 10; $i++) {
            $filename = Str::random(20). '.png';
            $path = 'public/'.$filename;

            $image = $faker->image(null, 400, 300);
            Storage::put($path, file_get_contents($image));
            // $filename = $faker->image(storage_path('app/public/'), 400, 300, null, false);
            Image::create([
                'name' => $filename,
                'file' => Storage::url($path),
                'enable' => true,
            ]);
        }
    }
}
