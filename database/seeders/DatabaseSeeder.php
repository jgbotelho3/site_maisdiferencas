<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Project::factory(10)->create();

            \App\Models\Axis::factory()
                                ->count(7)
                                ->sequence(
                                        ['word' => 'Formação'],
                                        ['word' => 'Pesquisa e experimentação'],
                                        ['word' => 'Monitoramento e avaliação'],
                                        ['word' => 'Assessoria à gestão'],
                                        ['word' => 'Acessibilidade'],
                                        ['word' => 'Comunicação'],
                                        ['word' => 'Práticas pedagógicas']  
                                )           
                                ->create();
     
            
        
        
    }
}
