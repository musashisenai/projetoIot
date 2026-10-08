<?php

namespace Database\Seeders;

use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    public function run(): void
    {
        $nomesAmbientes = ['Estufa Norte', 'Estufa Sul', 'Reservatório'];

        if (Ambiente::whereIn('nome', $nomesAmbientes)->count() !== count($nomesAmbientes)) {
            $this->call(AmbienteSeeder::class);
        }

        $ambientes = Ambiente::whereIn('nome', $nomesAmbientes)->get()->keyBy('nome');
        $sensores = [
            ['codigo' => 'TEMP-01', 'tipo' => 'Temperatura', 'descricao' => 'Sensor digital DS18B20', 'status' => true, 'ambiente' => 'Estufa Norte'],
            ['codigo' => 'UMID-01', 'tipo' => 'Umidade', 'descricao' => 'Umidade relativa do ar', 'status' => true, 'ambiente' => 'Estufa Norte'],
            ['codigo' => 'TEMP-02', 'tipo' => 'Temperatura', 'descricao' => 'Temperatura do setor de mudas', 'status' => true, 'ambiente' => 'Estufa Sul'],
            ['codigo' => 'LUZ-01', 'tipo' => 'Luminosidade', 'descricao' => 'Intensidade luminosa do ambiente', 'status' => false, 'ambiente' => 'Estufa Sul'],
        ];

        foreach ($sensores as $dados) {
            Sensor::updateOrCreate(
                ['codigo' => $dados['codigo']],
                [
                    'ambiente_id' => $ambientes[$dados['ambiente']]->id,
                    'tipo' => $dados['tipo'],
                    'descricao' => $dados['descricao'],
                    'status' => $dados['status'],
                ],
            );
        }
    }
}