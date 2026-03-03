<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarefa;
class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarefa::create([
            'name' => 'Tarefa 1',
            'situacaoAtual' => 'pendente',
            'user_id' => User::factory()->create()->id,
        ]);
    }
}
