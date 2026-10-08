<?php

namespace Database\Seeders;

use App\Models\Ambiente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmbienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ambientes = [
            ['nome' => 'Estufa Norte', 'descricao' => 'Cultivo hidropônico · Setor A', 'status' => true],
            ['nome' => 'Estufa Sul', 'descricao' => 'Bancadas de mudas · Setor B', 'status' => true],
            ['nome' => 'Reservatório', 'descricao' => 'Captação e qualidade da água', 'status' => false],
        ];

        foreach ($ambientes as $dados) {
            Ambiente::updateOrCreate(['nome' => $dados['nome']], $dados);
        }
    }
}
