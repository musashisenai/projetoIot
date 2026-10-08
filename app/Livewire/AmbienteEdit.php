<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{   
    public $ambiente_id;
    public $nome;
    public $descricao;
    public $status;

    public function mount($id)
    {
        $Ambiente = Ambiente::find($id);

        $this->nome = $Ambiente->nome;
        $this->descricao = $Ambiente->descricao;
        $this->status = $Ambiente->status;
    }

    public function update(){
        $Ambiente = Ambiente::find($this->ambiente_id);

        $Ambiente->nome = $this->nome;
        $Ambiente->descricao = $this->descricao;
        $Ambiente->status = $this->status;

        $Ambiente->update();

    }
    public function render()
    {
        return view('livewire.ambiente-edit');
    }
}
