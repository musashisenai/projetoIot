<?php

namespace App\Livewire;

use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SensorEdit extends Component
{
    public $sensor_id;
    public $ambiente_id = '';
    public $codigo = '';
    public $tipo = '';
    public $descricao = '';
    public $status = true;

    public function mount($id): void
    {
        $sensor = Sensor::findOrFail($id);
        $this->sensor_id = $sensor->id;
        $this->ambiente_id = $sensor->ambiente_id;
        $this->codigo = $sensor->codigo;
        $this->tipo = $sensor->tipo;
        $this->descricao = $sensor->descricao;
        $this->status = (bool) $sensor->status;
    }

    protected function rules(): array
    {
        return [
            'ambiente_id' => ['required', 'exists:ambientes,id'],
            'codigo' => ['required', 'string', 'max:255', Rule::unique('sensors', 'codigo')->ignore($this->sensor_id)],
            'tipo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'status' => ['boolean'],
        ];
    }

    public function update()
    {
        $validated = $this->validate();
        $sensor = Sensor::findOrFail($this->sensor_id);
        $sensor->update($validated);

        session()->flash('success', 'Sensor atualizado com sucesso.');
        return redirect()->route('sensor.index');
    }

    public function render()
    {
        return view('livewire.sensor-edit', [
            'ambientes' => Ambiente::orderBy('nome')->get(),
        ]);
    }
}
