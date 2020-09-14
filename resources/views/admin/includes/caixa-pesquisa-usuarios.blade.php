<form method="GET" action="{{route('admin.dashboard.usuarios.pesquisar')}}">
    <div class="input-group col-md-6" style="padding-left: 0;">
        <label for="query" style="display: none"></label>
        <input type="search" name="query" id="query" value="{{request()->input('query')}}" placeholder="Pesquise..." class="form-control">
        <div class="input-group-append">
            <button class="btn-icon btn-icon-only border-0 btn-transition btn btn-outline-danger">
                <i class="ion-ios-search btn-icon-wrapper"> </i>
            </button>
        </div>
    </div>
</form>