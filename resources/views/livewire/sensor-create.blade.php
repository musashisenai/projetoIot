<div class="sensor-form-page py-3">
    <div class="text-center mt-3 mb-4">
        <h2 class="h3 fw-semibold mb-1">Cadastrar sensor</h2>
        <p class="text-secondary mb-0">Preencha os dados e vincule o sensor a um ambiente.</p>
    </div>

    <div class="card sensor-form-card rounded-4 p-3 p-md-4 mx-auto" style="max-width: 38rem">
        <form wire:submit="store">
            <div class="mb-3">
                <label class="form-label" for="ambiente_id">Ambiente</label>
                <select id="ambiente_id" class="form-select @error('ambiente_id') is-invalid @enderror" wire:model="ambiente_id" required>
                    <option value="">Selecione um ambiente</option>
                    @foreach ($ambientes as $ambiente)
                        <option value="{{ $ambiente->id }}">{{ $ambiente->nome }}</option>
                    @endforeach
                </select>
                @error('ambiente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="codigo">Código</label>
                <input id="codigo" class="form-control @error('codigo') is-invalid @enderror" type="text" placeholder="Ex.: TEMP-01" wire:model="codigo" required>
                @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="tipo">Tipo</label>
                <input id="tipo" class="form-control @error('tipo') is-invalid @enderror" type="text" placeholder="Ex.: Temperatura" wire:model="tipo" required>
                @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição</label>
                <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="3" placeholder="Descreva a função do sensor" wire:model="descricao" required></textarea>
                @error('descricao') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" wire:model="status" type="checkbox" role="switch" id="sensor-status-create">
                <label class="form-check-label" for="sensor-status-create">Sensor ativo</label>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Cadastrar</span>
                    <span wire:loading wire:target="store">Salvando...</span>
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('sensor.index') }}">Voltar</a>
            </div>
        </form>
    </div>
</div>
