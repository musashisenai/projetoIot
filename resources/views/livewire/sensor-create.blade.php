<div class="p-2 text-dark bg-opacity-25 d-flex flex-column justify-content-center align-items-center">
    <div class=" text-center mt-4">
        <h3 class="card-title text-light-emphasis mb-3">Cadastrar Sensor</h3>
    </div>
    <div class="card shadow border border-primary p-3 mb-5 bg-white rounded container" style="max-width: 30rem">
        <form wire:submit="store">
            <div class="rol-12">
                <p> Codigo </p>
                <input class="col-12 mb-4" type="text" placeholder="Codigo" wire:model="codigo">
                <p> Tipo </p>
                <input class="col-12 mb-4" type="text" placeholder="Tipo" wire:model="tipo">
                <p> Descrição </p>
                <input class="col-12 mb-4" type="text" placeholder="Descrição" wire:model="descricao">
                <p> Status </p>
                <div class="col-12 mb-4 form-check form-switch">
                    <input class="form-check-input" wire:model="status" type="checkbox" value=""
                        id="checkNativeSwitch" switch>
                    <label class="form-check-label" for="checkNativeSwitch">
                        Ativar
                    </label>
                </div>

                <button class="bg-primary btn text-white border-secondary rounded-2" type="submit">Cadastrar</button>
        </form>
        <a class="bg-danger btn text-white border-secondary rounded-2" href='{{ route('sensor.index') }}'>Voltar</a>

    </div>
</div>
