<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'Super Admin','description'=>'Tüm kullanıcılara, ürünlere, izinler, rollere vs. erişimi vardır']);
        Role::create(['name'=>'Admin','description'=>'Tüm kullanıcılara, ürünlere, kategorilere erişimi vardır']);
        Role::create(['name'=>'Customer','description'=>'Kendine ait tüm verilerine erişimi vardır']);
    }
}
