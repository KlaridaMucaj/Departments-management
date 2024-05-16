<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

         \App\Models\User::factory(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('1234567'),
        //     'role' => 'Admin',
        // ]);


        DB::table('users')->insert([
            'departament_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => 'admin'

         ]);
        // DB::table('users')->insert([
        //     'departament_id' => 1,
        //     'name' => 'Employee',
        //     'email' => 'employee@gmail.com',
        //     'password' => Hash::make('1234567'),
        //     'role' => 'Employee'

        // ]);
        // DB::table('departament')->insert([
        //     'name' => 'Informatics',
        // ]);

        // DB::table('departament')->insert([
        //     'name' => 'Biology',
        // ]);
       
    }
}
