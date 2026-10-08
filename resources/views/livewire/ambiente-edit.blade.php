<div>
    <div class=" text-center mt-4">
        <h3>Editar Ambiente</h3>
    </div>
    <div class="container card p-5 shadow" style="max-width: 30rem">
    <form wire:submit="update">
        <div class="rol-12">
            <p> Nome </p>
            <input class="col-12 mb-4" type="text" placeholder="Nome" wire:model="nome">
            <p> Descrição </p>
            <input class="col-12 mb-4" type="text" placeholder="Descrição" wire:model="descricao">
            <p> Status </p>
                <div class="col-12 mb-4 form-check form-switch" >
                    <input class="form-check-input" wire:model="status" type="checkbox" value="" id="checkNativeSwitch" switch>
                    <label class="form-check-label" for="checkNativeSwitch">
                        Ativar
                    </label>
                </div>

        </div>
        <button class="bg-primary text-white border-secondary rounded-2" type="submit">Salvar</button>
        <a class="bg-danger btn text-white border-secondary rounded-2" href='{{ route('ambiente.index') }}'>Voltar</a>
    </form>
    
    </div>
</div>
