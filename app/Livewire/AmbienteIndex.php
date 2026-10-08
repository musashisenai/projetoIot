<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteIndex extends Component
{

    public function delete($id){
        $ambiente = Ambiente::find($id);
        if($ambiente != null){
            $ambiente->delete();
            session()->flash('success', 'Excluido');
        }
    }

    public function render()
    {

    $ambientes = Ambiente::all();
        return view('livewire.ambiente-index', compact('ambientes'));
    }

    public function status($id){
        $ambiente = Ambiente::find($id);
        $ambiente->status = !$ambiente->status;
        $ambiente->save();
    }
}
