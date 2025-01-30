<?php

namespace Database\Seeders;

use App\Models\CountryCode;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CountryCode::create(['country'=>'TR','code'=>'+90']);
        CountryCode::create(['country'=>'EN','code'=>'+120']);
        CountryCode::create(['country'=>'US','code'=>'+44']);
    }
}
