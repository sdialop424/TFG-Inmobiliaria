<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::FirstOrCreate(['nombre'=> 'admin','email'=>'admin@admin.com','password'=>bcrypt('admin'),'rol_id'=> '1']);
        User::FirstOrCreate(['nombre'=> 'sebas','email'=>'sebas@sebas.com','password'=>bcrypt('1234'),'rol_id'=> '2']);
        User::factory()->count(10)->create();
    }
}
