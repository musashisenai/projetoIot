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
                        <td>{{ $a->status }}</td>
                        <td>
                            <a href="{{ route('ambiente.edit', ['id' => $a->id] )}}"
                                class="btn btn-primary btn-sm">Editar</a>
                            <button
                                class="btn btn-danger btn-sm"wire:click="delete({{ $a->id }})">Excluir</button>
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
