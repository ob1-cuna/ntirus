<div class="main-card card">
        <ul class="list-group">
            <li class="list-group-item text-muted">Estatisticas</li>
            <li class="list-group-item"><span class="text-left">Trabalhos Publicados</span> <o class="pull-right">{{ App\Trabalho::where('user_id', Auth::user()->id)->count() }}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Abertos</span> <o class="pull-right">{{ getEstatisticaCliente(Auth::user()->id, 'Aberto', 'trabalhos') }}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Em Andamento</span> <o class="pull-right">{{ getEstatisticaCliente(Auth::user()->id, 'Em Andamento', 'trabalhos') + getEstatisticaCliente(Auth::user()->id, 'Aprovado', 'trabalhos') + getEstatisticaCliente(Auth::user()->id, 'AguardandoAC', 'trabalhos') + getEstatisticaCliente(Auth::user()->id, 'Recusado', 'trabalhos')}}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Cancelados</span> <o class="pull-right">{{ getEstatisticaCliente(Auth::user()->id, 'Cancelado-C', 'trabalhos') }} | {{ getEstatisticaCliente(Auth::user()->id, 'Cancelado-F', 'trabalhos') }}</o></li>
            <li class="list-group-item"><span class="text-left">Pagamentos Feitos</span> <o class="pull-right">{{ getEstatisticaCliente(Auth::user()->id, 'Concluido', 'transacaos') }}</o></li>
            <li class="list-group-item"><span class="text-left">Pagamentos Pendentes</span> <o class="pull-right">{{ getEstatisticaCliente(Auth::user()->id, 'Pendente', 'transacaos') + getEstatisticaCliente(Auth::user()->id, 'Por Confirmar', 'transacaos') }}</o></li>
        </ul>
</div>
<br>
