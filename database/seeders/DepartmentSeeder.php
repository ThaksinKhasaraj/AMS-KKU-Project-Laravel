<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $user = User::create([
        //     'dept_name' => "เจ้าหน้าที่ นักวิชาการคอมพิวเตอร์",
        //     'manager_name' => "เจ้าหน้าที่ นักวิชาการคอมพิวเตอร์",
        //     'dept_address' => "คณะเทคนิคการแพทย์",
        //     'password' => Hash::make('12345678'),
        // ]);    
    }
}
