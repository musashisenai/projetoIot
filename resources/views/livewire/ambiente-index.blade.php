<div class="sensor-list-page">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4 mb-3">
        <div>
            <h2 class="h3 fw-semibold mb-1">Ambientes</h2>
            <p class="text-secondary mb-0">Ambientes cadastrados e seus espaços.</p>
        </div>
        <a href="{{ route('ambiente.create') }}" class="btn btn-primary rounded-3 text-decoration-none"><i class="bi bi-plus-lg me-1" aria-hidden="true"></i> Cadastrar ambiente</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <div class="sensor-surface card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ambientes as $ambiente)
                        <tr wire:key="ambiente-{{ $ambiente->id }}">
                            <td>{{ $ambiente->id }}</td>
                            <td class="fw-semibold">{{ $ambiente->nome }}</td>
                            <td>{{ $ambiente->descricao }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <input class="form-check-input m-0" type="checkbox" role="switch" id="status-{{ $ambiente->id }}" wire:click="status({{ $ambiente->id }})" @checked($ambiente->status) aria-label="Alternar status de {{ $ambiente->nome }}">
                                    <span class="badge rounded-pill bg-{{ $ambiente->status ? 'success' : 'secondary' }}">{{ $ambiente->status ? 'ATIVO' : 'INATIVO' }}</span>
                                </div>
                            </td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('ambiente.edit', ['id' => $ambiente->id]) }}" class="btn btn-outline-primary btn-sm" aria-label="Editar {{ $ambiente->nome }}"><i class="bi bi-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-outline-danger btn-sm" wire:click="delete({{ $ambiente->id }})" wire:confirm="Tem certeza que deseja excluir este ambiente?" aria-label="Excluir {{ $ambiente->nome }}"><i class="bi bi-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-secondary py-5">Nenhum ambiente cadastrado ainda.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
