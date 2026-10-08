<?php

namespace App\Livewire;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{
    public $ambiente_id = '';
    public $codigo = '';
    public $tipo = '';
    public $descricao = '';
    public $status = true;

    protected function rules(): array
    {
        return [
            'ambiente_id' => ['required', 'exists:ambientes,id'],
            'codigo' => ['required', 'string', 'max:255', 'unique:sensors,codigo'],
            'tipo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'status' => ['boolean'],
        ];
    }

    public function store()
    {
        $validated = $this->validate();
        Sensor::create($validated);

        session()->flash('success', 'Sensor cadastrado com sucesso.');
        return redirect()->route('sensor.index');
    }

    public function render()
    {
        return view('livewire.sensor-create', [
            'ambientes' => Ambiente::orderBy('nome')->get(),
        ]);
    }
}
