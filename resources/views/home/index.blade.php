@extends('app')

@section('content')

    <nav>
        <div class="nav-wrapper teal darken-1">
            <a href="#" class="brand-logo">&nbsp;Teste</a>
        </div>
    </nav>

    @include('message')

    <div class="card p5">
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="row">
                <h4>Nova tarefa</h4>
            </div>
            <div class="row">
                <div class="input-field col s12 l6">
                    <input id="name" name="name" type="text" class="validate @error('title') is-invalid @enderror">
                    <label class="active" for="name">Tarefa</label>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn waves-effect waves-light">
                    <ion-icon name="save-outline"></ion-icon>&nbsp;Cadastrar
                </button>
            </div>
        </form>

        <div class="row">
            <h4>Tarefas</h4>
        </div>
        <div class="row right-align">
            <span class="info-text"><ion-icon name="swap-horizontal-outline"></ion-icon>&nbsp;Arraste no celular</span>
        </div>
        <div style="overflow-x:auto">
            <table class="striped">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tasks as $task)
                    @include('home.edit_modal')
                    <tr>
                        <td>{{$task['id']}}</td>
                        <td>{{$task['name']}}</td>
                        <td><span
                                class="badge white-text {{ $task['status'] ? 'green' : 'orange' }}">{{ $task['status'] ? 'Pronto' : 'Em espera' }}</span>
                        </td>
                        <td>
                            <a href="#{{'modal' . $task['id']}}"
                               class="btn-floating btn-large waves-effect waves-light teal lighten-1 modal-trigger">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <a href="{{ route('task.delete', [$task['id']]) }}"
                               onclick='return confirm("Deseja realmente excluir essa tarefa?")'
                               class="btn-floating btn-large waves-effect waves-light red">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Não há tarefas cadastradas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
