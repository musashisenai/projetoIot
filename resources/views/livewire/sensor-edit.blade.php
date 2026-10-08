<div>
    <div class=" text-center mt-4">
        <h3>Editar Sensor</h3>
    </div>
    <div class="container card p-5 shadow" style="max-width: 30rem">
        <form wire:submit="edit">
            <div class="rol-12">
                <p> Codigo </p>
                <input class="col-12 mb-4" type="text" placeholder="Codigo" wire:model="codigo">
                <p> Tipo </p>
                <input class="col-12 mb-4" type="text" placeholder="Tipo" wire:model="tipo">
                <p> Descrição </p>
                <input class="col-12 mb-4" type="text" placeholder="Descrição" wire:model="descricao">
                <p> Status </p>
                <div class="col-12 mb-4 form-check" wire:model="status">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" checked>
                    <label class="form-check-label" for="radioDefault1">
                        Ativo
                    </label>
                </div>
                <div class="col-12 mb-4 form-check" wire:model="status">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2">
                    <label class="form-check-label" for="radioDefault2">
                        Inativo
                    </label>
                </div>

            </div>
            <button class="bg-primary text-white border-secondary rounded-2" type="edit">Salvar</button>
        </form>
    </div>
</div>
