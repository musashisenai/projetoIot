<div>
    <div>
        <h2 class="d-flex text-center mt-4">Ambientes</h2>
    </div>

    <div class="card-body shadow">
        <table class="table table-striped border-secondary ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ambientes as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->nome }}</td>
                        <td>{{ $a->descricao }}</td>
                        <td><input class="form-check-input" type="checkbox" role="switch" id="status-{{ $a->id }}"
                                wire:click="status({{ $a->id }})"
                            @checked($a->status)
                            {{ $a->status }}>
                             <span class="badge bg-{{ $a->status ? 'success' : 'danger' }}">
                                {{ $a->status ? 'ATIVO' : 'INATIVO' }}
                             </span>
                        </td>
                        <td>
                            <a href="{{ route('ambiente.edit', ['id' => $a->id]) }}"
                                class="btn btn-primary btn-sm"><i class="bi bi-pen"></i></a>
                            <button
                                class="btn btn-danger btn-sm"wire:click="delete({{ $a->id }})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
@endforeach
            </tbody>
        </table>
    </div>
    <div>
        
    <a  href="{{ route('ambiente.create') }}"
        class="bg-primary rounded-4 text-white p-2 text-decoration-none float-sm-end"><i class="bi bi-patch-plus"></i> Cadastrar Ambiente</a>
</div>
</div>
