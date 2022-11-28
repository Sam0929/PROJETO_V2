<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            
            'name' => "Xastre",
            'email' => 'xastre_professor@gmail.com',
            'password' => Hash::make('profxastre'),
        ]);

        DB::table('users')->insert([
            
            'name' => "Sam",
            'email' => 'Sam@gmail.com',
            'password' => Hash::make('1234qwer'),
            'admin' => '1',
        ]);
        DB::table('cursos')->insert([
            
            'Nome' => "Cálculo integrado",
            'Tipo' => 'Matematica',
            'Resumo' =>'Cálculo A,B,C',
            'Descrição' => '1',
            'Max' => '100',
            'Min' => '10',
            'Status' => '1',
            'user_id' => '2',
        
        ]);
        DB::table('users')->insert([
            
            'name' => "Lucas",
            'email' => 'Lucas@gmail.com',
            'password' => Hash::make('123456789'),
            'admin' => '1',
        ]);
    }
}
