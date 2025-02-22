<?php

namespace Database\Seeders;

use App\Models\Info;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin",
            'email' => "admin@haventwined.com",
            "password" => bcrypt("password")
        ]);

        Info::create([
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur iste earum sunt quia temporibus laborum soluta doloremque? Expedita beatae, quisquam corrupti ea obcaecati veritatis id quae rerum, aperiam error atque distinctio dolorem deserunt architecto consequuntur, deleniti aspernatur officia culpa exercitationem.",
            "email" => "support@haventwined.com",
            "phone" => "82299449708"
        ]);
    }
}
