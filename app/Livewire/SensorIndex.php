<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorIndex extends Component
{
    public function render()
    {
        $sensores = Sensor::with('ambiente')->orderBy('id')->get();
        return view('livewire.sensor-index', compact('sensores'));
    }

    public function status($id): void
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->status = ! $sensor->status;
        $sensor->save();
    }

    public function delete($id): void
    {
        Sensor::findOrFail($id)->delete();
        session()->flash('success', 'Sensor excluído com sucesso.');
    }
}
