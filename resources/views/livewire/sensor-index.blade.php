<div class="sensor-list-page">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4 mb-3">
        <div>
            <h2 class="h3 fw-semibold mb-1">Sensores</h2>
            <p class="text-secondary mb-0">Sensores cadastrados e seus ambientes.</p>
        </div>
        <a href="{{ route('sensor.create') }}" class="btn btn-primary rounded-3 text-decoration-none"><i class="bi bi-plus-lg me-1" aria-hidden="true"></i> Cadastrar sensor</a>
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
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ambiente</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sensores as $sensor)
                        <tr wire:key="sensor-{{ $sensor->id }}">
                            <td>{{ $sensor->id }}</td>
                            <td class="fw-semibold">{{ $sensor->codigo }}</td>
                            <td>{{ $sensor->tipo }}</td>
                            <td>{{ $sensor->descricao }}</td>
                            <td>{{ $sensor->ambiente?->nome ?? 'Ambiente não encontrado' }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <input class="form-check-input m-0" type="checkbox" role="switch" id="status-{{ $sensor->id }}" wire:click="status({{ $sensor->id }})" @checked($sensor->status) aria-label="Alternar status de {{ $sensor->codigo }}">
                                    <span class="badge rounded-pill bg-{{ $sensor->status ? 'success' : 'secondary' }}">{{ $sensor->status ? 'ATIVO' : 'INATIVO' }}</span>
                                </div>
                            </td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('sensor.edit', ['id' => $sensor->id]) }}" class="btn btn-outline-primary btn-sm" aria-label="Editar {{ $sensor->codigo }}"><i class="bi bi-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-outline-danger btn-sm" wire:click="delete({{ $sensor->id }})" wire:confirm="Tem certeza que deseja excluir este sensor?" aria-label="Excluir {{ $sensor->codigo }}"><i class="bi bi-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-secondary py-5">Nenhum sensor cadastrado ainda.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
