<div>
    <div>
        <h2 class="d-flex text-center mt-4">Sensores</h2>
    </div>

    <div class="card-body shadow">
        <table class="table table-striped border-secondary ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sensores as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->codigo }}</td>
                        <td>{{ $s->tipo }}</td>
                        <td>{{ $s->descricao }}</td>
                        <td><input class="form-check-input" type="checkbox"
                            role="switch" id="status-{{$sensor->id}}"
                            wire:click='"status({{$sensor->id}})"
                            @checked($sensor->status)
                            {{ $s->status }}>
                             <span class="badge bg-{{$sensor->status ? 'success': 'danger'}}">
                                {{$sensor->status ? 'ATIVO':'INATIVO'}}
                             </span>
                        </td>
                            
                        <td>
                            <a href="{{ route('sensor.edit', ['id' => $s->id]) }}"
                                class="btn btn-primary btn-sm">Editar</a>
                            <button
                                class="btn btn-danger btn-sm"wire:click="delete({{ $s->id }})">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        
    <a  href="{{ route('sensor.create') }}"
        class="bg-primary rounded-4 text-white p-2 text-decoration-none float-sm-end"><i class="bi bi-patch-plus"></i> Cadastrar Sensor</a>
</div>
</div>
