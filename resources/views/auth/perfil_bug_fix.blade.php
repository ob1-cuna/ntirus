


@switch(Auth::user()->perfil->status)
    @case (0)
        @include('auth.perfil_cadastro')
    @break

    @case (2)
        @include('auth.cadastro_ultimo_passo')
    @break

    @default
    <h2 class="centro-horizontal mt-5">MISTAKE</h2>
@endswitch