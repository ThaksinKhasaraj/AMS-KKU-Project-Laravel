<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::create([
            'name' => "เจ้าหน้าที่ นักวิชาการคอมพิวเตอร์",
            'email' => "admin@ams.com",
            'role' => "แอดมิน",
            'department_id' => "1",
            'password' => Hash::make('12345678'),
        ]);

    
    }
}
