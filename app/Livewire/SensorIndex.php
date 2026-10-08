<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorIndex extends Component
{

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    public function render()
    {
        $sensores = Sensor::all();
        return view('livewire.sensor-index', compact('sensores'));
    }

    public function status($id){
        $sensor = Sensor::find($id);
        $sensor->status = !$sensor->status;
        $sensor->save();
    }
}
