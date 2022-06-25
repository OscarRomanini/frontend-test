@if(session()->get('message'))
    <!-- Modal Structure -->
    <div id="modal-message" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>{{ key(session()->get('message')) == 'success' ? 'Sucesso!' : 'Erro!' }}</h4>
            <p>{{ key(session()->get('message')) == 'success' ? session()->get('message')['success'] : session()->get('error') }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK!</a>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, []);
        var instance = M.Modal.getInstance($('#modal-message'));
        instance.open();
    });
</script>
