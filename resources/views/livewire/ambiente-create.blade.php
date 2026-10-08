<div class="sensor-form-page py-3">
    <div class="text-center mt-3 mb-4">
        <h2 class="h3 fw-semibold mb-1">Cadastrar ambiente</h2>
        <p class="text-secondary mb-0">Preencha os dados para adicionar um ambiente.</p>
    </div>

    <div class="card sensor-form-card border-0 rounded-4 p-3 p-md-4 mx-auto" style="max-width: 38rem">
        <form wire:submit="store">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome</label>
                <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" placeholder="Ex.: Estufa Norte" wire:model="nome" required>
                @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição</label>
                <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="3" placeholder="Descreva este ambiente" wire:model="descricao"></textarea>
                @error('descricao') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" wire:model="status" type="checkbox" role="switch" id="ambiente-status-create">
                <label class="form-check-label" for="ambiente-status-create">Ambiente ativo</label>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Cadastrar</span>
                    <span wire:loading wire:target="store">Salvando...</span>
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('ambiente.index') }}">Voltar</a>
            </div>
        </form>
    </div>
</div>
