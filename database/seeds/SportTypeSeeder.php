<?php

use Illuminate\Database\Seeder;

class SportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SportType::insert(['name'=>'Running']);
        \App\SportType::insert(['name'=>'Walking']);
        \App\SportType::insert(['name'=>'Nordic Walking']);
        \App\SportType::insert(['name'=>'Race Walking']);
        \App\SportType::insert(['name'=>'Track&Field']);
        \App\SportType::insert(['name'=>'Cycling']);
        \App\SportType::insert(['name'=>'Hand Cycling']);
        \App\SportType::insert(['name'=>'Wheel Chair Racing']);
        \App\SportType::insert(['name'=>'Crossfit']);
        \App\SportType::insert(['name'=>'Weight Lifting']);
        \App\SportType::insert(['name'=>'Roller Skiing']);
        \App\SportType::insert(['name'=>'Inline Skating']);
        \App\SportType::insert(['name'=>'Swimming']);
        \App\SportType::insert(['name'=>'Rowing']);
        \App\SportType::insert(['name'=>'Kayaking']);
        \App\SportType::insert(['name'=>'Canoeing']);       
        \App\SportType::insert(['name'=>'Kayaking']);
        \App\SportType::insert(['name'=>'Surfing']);
        \App\SportType::insert(['name'=>'Kitesurfing']);
        \App\SportType::insert(['name'=>'SUP']);
        \App\SportType::insert(['name'=>'Other']);

    }
}
