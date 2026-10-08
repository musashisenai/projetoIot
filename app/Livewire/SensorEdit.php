<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

     public function edit()
    {
        $Sensor = Sensor::find();

        $this->ambiente_id = $Sensor->ambiente_id;
        $this->codigo = $Sensor->codigo;
        $this->tipo = $Sensor->tipo;
        $this->descricao = $Sensor->descricao;
        $this->status = $Sensor->status;

        $Sensor->save();

        session()->flash('success', 'Sensor atualizado');
        return redirect()->route('sensor.index');
    }
    public function render()
    {
        return view('livewire.sensor-edit');
    }
}
