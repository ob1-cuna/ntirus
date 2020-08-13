
@if($user->is_permission=='1')
    @include("admin.includes.ver_cliente_admin")
@else
    @include("admin.includes.ver_freelancer_admin")
@endif