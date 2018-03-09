<?php

use Illuminate\Database\Seeder;
use App\Models\Practice;

class PracticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = ['男','女','未知'];
        $faker = app(Faker\Generator::class);

        $practice = factory(Practice::class)->times(50)->make()->each(function ($practice) use ($faker, $sex) {
            $practice->sex = $faker->randomElement($sex);
        });

        Practice::insert($practice->toArray());
    }
}
