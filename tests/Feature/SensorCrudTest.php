<?php

namespace Tests\Feature;

use App\Livewire\SensorCreate;
use App\Livewire\SensorEdit;
use App\Livewire\SensorIndex;
use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SensorCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_sensor_can_be_created_with_a_required_environment(): void
    {
        $ambiente = Ambiente::create(['nome' => 'Estufa Norte', 'descricao' => 'Estufa', 'status' => true]);

        Livewire::test(SensorCreate::class)
            ->set('ambiente_id', $ambiente->id)
            ->set('codigo', 'TEMP-01')
            ->set('tipo', 'Temperatura')
            ->set('descricao', 'Temperatura do ar')
            ->set('status', true)
            ->call('store')
            ->assertHasNoErrors()
            ->assertRedirect(route('sensor.index'));

        $this->assertDatabaseHas('sensors', [
            'ambiente_id' => $ambiente->id,
            'codigo' => 'TEMP-01',
            'tipo' => 'Temperatura',
            'status' => 1,
        ]);
    }

    public function test_sensor_creation_requires_a_valid_environment_and_unique_code(): void
    {
        $ambiente = Ambiente::create(['nome' => 'Estufa Norte', 'descricao' => 'Estufa', 'status' => true]);
        Sensor::create(['ambiente_id' => $ambiente->id, 'codigo' => 'TEMP-01', 'tipo' => 'Temperatura', 'descricao' => 'Leitura']);

        Livewire::test(SensorCreate::class)
            ->set('codigo', 'TEMP-01')
            ->set('tipo', 'Temperatura')
            ->set('descricao', 'Duplicado')
            ->call('store')
            ->assertHasErrors(['ambiente_id' => 'required', 'codigo' => 'unique']);
    }

    public function test_sensor_can_be_updated_without_changing_its_identity(): void
    {
        $ambiente = Ambiente::create(['nome' => 'Estufa Norte', 'descricao' => 'Estufa', 'status' => true]);
        $sensor = Sensor::create(['ambiente_id' => $ambiente->id, 'codigo' => 'TEMP-01', 'tipo' => 'Temperatura', 'descricao' => 'Antiga', 'status' => true]);

        Livewire::test(SensorEdit::class, ['id' => $sensor->id])
            ->set('tipo', 'Temperatura e umidade')
            ->set('descricao', 'Descrição atualizada')
            ->set('status', false)
            ->call('update')
            ->assertHasNoErrors()
            ->assertRedirect(route('sensor.index'));

        $this->assertDatabaseHas('sensors', [
            'id' => $sensor->id,
            'codigo' => 'TEMP-01',
            'tipo' => 'Temperatura e umidade',
            'descricao' => 'Descrição atualizada',
            'status' => 0,
        ]);
    }

    public function test_sensor_can_be_deleted_from_the_index(): void
    {
        $ambiente = Ambiente::create(['nome' => 'Estufa Norte', 'descricao' => 'Estufa', 'status' => true]);
        $sensor = Sensor::create(['ambiente_id' => $ambiente->id, 'codigo' => 'TEMP-01', 'tipo' => 'Temperatura', 'descricao' => 'Leitura']);

        Livewire::test(SensorIndex::class)
            ->call('delete', $sensor->id)
            ->assertHasNoErrors();

        $this->assertDatabaseMissing('sensors', ['id' => $sensor->id]);
    }
}
