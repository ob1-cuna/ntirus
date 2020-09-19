<div class="modal fade" id="modalSuspenderUsuario" tabindex="-1" role="dialog" aria-labelledby="modalSuspenderUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSuspenderUsuarioLabel">Suspender conta de usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Tem certeza que deseja suspender o <b>{{ $user->name }}</b>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <form method="post" action="{{ route('admin.dashboard.usuarios.suspender', ['user' => $user->id ]) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalApagarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalApagarUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalApagarUsuarioLabel">Apagar conta de usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Tem certeza que deseja apagar a conta de <b>{{ $user->name }}</b>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <form method="post" action="">
                    @csrf
                    <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                </form>

            </div>
        </div>
    </div>
</div>
