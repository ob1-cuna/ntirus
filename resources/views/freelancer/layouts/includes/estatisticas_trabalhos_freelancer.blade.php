<div class="main-card card">
        <ul class="list-group">
            <li class="list-group-item text-muted">Estatisticas</li>
            <li class="list-group-item"><span class="text-left">Trabalhos Concorridos</span> <o class="pull-right">{{ getEstatisticaPropostas(Auth::user()->id, 'Pendente') + getEstatisticaPropostas(Auth::user()->id, 'Recusado') + getEstatisticaPropostas(Auth::user()->id, 'Aceite')}}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Aprovados</span> <o class="pull-right">{{ getEstatisticaPropostas(Auth::user()->id, 'Aceite') }}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Em Andamento</span> <o class="pull-right">{{ getEstatisticaFreelancer(Auth::user()->id, 'Em Andamento') + getEstatisticaFreelancer(Auth::user()->id, 'AguardandoAC') + getEstatisticaFreelancer(Auth::user()->id, 'Aprovado') + getEstatisticaFreelancer(Auth::user()->id, 'Recusado')}}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Cancelados</span> <o class="pull-right">{{ getEstatisticaFreelancer(Auth::user()->id, 'cancelado-f') }} | {{ getEstatisticaFreelancer(Auth::user()->id, 'cancelado-c') }}</o></li>
            <li class="list-group-item"><span class="text-left">Trabalhos Finalizados</span> <o class="pull-right">{{ getEstatisticaFreelancer(Auth::user()->id, 'finalizado') }}</o></li>
        </ul>
</div>
<br> 