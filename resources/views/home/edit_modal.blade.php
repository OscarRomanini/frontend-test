<div id="{{ 'modal' . $task['id'] }}" class="modal modal-fixed-footer">
    <form action="{{ route('task.update', [$task['id']]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <h4>Editar tarefa</h4>

            <div class="row">
                <div class="input-field col s12">
                    <input value="{{ isset($task) ? $task['name'] : '' }}" id="name" name="name" type="text" class="validate @error('title') is-invalid @enderror">
                    <label class="active" for="name">Tarefa</label>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <div class="switch">
                        <label>
                            Não
                            <input type="checkbox" name="status" {{ $task['status'] ? 'checked' : '' }}>
                            <span class="lever"></span>
                            Sim
                        </label>
                    </div>
                    <label class="active" for="status">Finalizada? </label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
            <button type="submit" class="btn waves-effect blue lighten-3 waves-green btn-flat">Atualizar</button>
        </div>
    </form>
</div>
