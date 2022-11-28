<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
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
            'admin' => '1',
        ]);
        
        DB::table('users')->insert([
            
            'name' => "Xastre",
            'email' => 'xastre_professor@gmail.com',
            'password' => Hash::make('profxastre'),
            'profe' => '1',
        ]);

        DB::table('users')->insert([
            
            'name' => "Sam",
            'email' => 'Sam@gmail.com',
            'password' => Hash::make('1234qwer'),
            'admin' => '1',
        ]);
        
        DB::table('users')->insert([

            'name' => "Aluno1",
            'email' => 'Aluno1@gmail.com',
            'password' => Hash::make('1234qwer'),
            'client'=> '1',
        ]);
        DB::table('users')->insert([

            'name' => "Aluno2",
            'email' => 'Aluno2@gmail.com',
            'password' => Hash::make('1234qwer'),
            'client'=> '1',
        ]);
        DB::table('users')->insert([

            'name' => "Aluno3",
            'email' => 'Aluno3@gmail.com',
            'password' => Hash::make('1234qwer'),
            'client'=> '1',
    ]);
        DB::table('users')->insert([

            'name' => "Aluno4",
            'email' => 'Aluno4@gmail.com',
            'password' => Hash::make('1234qwer'),
            'client'=> '1',
        ]);
        DB::table('users')->insert([

            'name' => "Professor1",
            'email' => 'Professor1@gmail.com',
            'password' => Hash::make('1234qwer'),
            'profe' => '1',
        ]);
        DB::table('users')->insert([

            'name' => "Professor2",
            'email' => 'Professor2@gmail.com',
            'password' => Hash::make('1234qwer'),
            'profe'=> '1',
        ]);


        DB::table('cursos')->insert([
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
            'Nome' => "Cálculo integrado",
            'Tipo' => 'Matematica',
            'Resumo' =>'Cálculo A,B,C',
            'Descrição' => '1',
            'Max' => '100',
            'Min' => '10',
            'user_id' => '2',
        
        ]);
        DB::table('cursos')->insert([
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
            'Nome' => "Cálculo 1",
            'Tipo' => 'Matematica',
            'Resumo' =>'Cálculo A',
            'Descrição' => '1',
            'Max' => '100',
            'Min' => '10',
            'user_id' => '2',
        
        ]);
        DB::table('cursos')->insert([
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
            'Nome' => "Cálculo 2",
            'Tipo' => 'Matematica',
            'Resumo' =>'Cálculo B',
            'Descrição' => '1',
            'Max' => '100',
            'Min' => '10',
            'user_id' => '2',
        
        ]);
        DB::table('cursos')->insert([
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
            'Nome' => "Cálculo 3",
            'Tipo' => 'Matematica',
            'Resumo' =>'Cálculo C',
            'Descrição' => '1',
            'Max' => '100',
            'Min' => '10',
            'user_id' => '2',
        
        ]);

        DB::table('Alunos')->insert([
           
            'Nome' => "Aluno1",
            'CPF' => '123456789',
            'Endereço' => 'Rua 1',
            'Filme' => 'Matrix',
            'user_id' => '4',
        
        ]);
        DB::table('Alunos')->insert([
            
            'Nome' => "Aluno2",
            'CPF' => '123456789',
            'Endereço' => 'Rua 2',
            'Filme' => 'Transformers',
            'user_id' => '5',
        
        ]);
        DB::table('Alunos')->insert([
            
            'Nome' => "Aluno3",
            'CPF' => '123456789',
            'Endereço' => 'Rua 3',
            'Filme' => 'Tron',
            'user_id' => '6',
        
        ]);
        DB::table('Alunos')->insert([
            
            'Nome' => "Aluno4",
            'CPF' => '123456789',
            'Endereço' => 'Rua 4',
            'Filme' => 'Massacre da Serra Elétrica',
            'user_id' => '7',
        
        ]);
        DB::table('profe')->insert([

            'Nome' => "Professor1",
            'CPF' => '123456789',
            'Endereço' => 'Rua 5',
            'user_id' => '8',
        ]);
        DB::table('profe')->insert([

            'Nome' => "Professor2",
            'CPF' => '123456789',
            'Endereço' => 'Rua 6',
            'user_id' => '9',
        ]);
    }
}
