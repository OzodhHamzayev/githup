<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            "email" => "admin@admin.com",
            "password" => bcrypt("password"),
            "image_email" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtz4ywqIj5QdGq2_nxs72_wAwhPPkiuc0VCwWmpd6tuA&s",

        ]);
        User::factory(10)->create();
    }
}
