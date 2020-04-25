@extends('Academia.plantillaAcademia')

@section('content')
<div class="row" style="opacity: 1;">
    <div class="col-lg-12">
        <h2>Reporte mensual</h2>
    </div>
</div>
<div class="row" style="opacity: 1;">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte de mis notas</h3>
                <form method="POST" name="miMes" action="{{ action('AcademiaController@actualizarMes') }}">
                    @csrf
                    <select name="mesActual" id="mesActual" class="panel-title" onchange="actualizarMes()">
                        @for ($i = $mesInicial; $i <= $mesFinal; $i++)
                            @if ($misMeses[0] == $i)
                                <option value="{{$misMeses[$i-$mesInicial+1]}}" selected>{{$misMeses[$i-$mesInicial+1]}}</option>
                            @else
                                <option value="{{$misMeses[$i-$mesInicial+1]}}">{{$misMeses[$i-$mesInicial+1]}}</option>
                            @endif
                        @endfor
                    </select>
                    <script>
                        function actualizarMes( ){
                            document.miMes.submit();
                        }
                    </script>
                </form>
                <ul class="panel-controls">
                    <li>
                        <button id="exportar" class="pull-right btn btn-primary" type="button">
                            <i class="far fa-file-pdf"></i>
                            Descargar en PDF
                        </button>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <canvas id="puntajeSM" width="1" height="1"></canvas>
                        <script>
                            var graficoSM = document.getElementById("puntajeSM").getContext("2d");
                            var puntajeSM = new Chart(graficoSM, {
                                type: 'bar',
                                data: {
                                    labels: [<?php echo $dataFecha; ?>],
                                    backgroundColor: ["rgba(0,0,0,0.2)"],
                                    datasets: [{
                                        label: 'Puntaje UNMSM',
                                        data: [<?php echo $dataPuntajeSM; ?>],
                                        backgroundColor: [ <?php echo $colorSM; ?> ],
                                        borderColor: [ <?php echo $colorSM; ?> ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    /* maintainAspectRatio: false, */
                                    scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <canvas id="puntajeVilla" width="1" height="1"></canvas>
                        <script>
                            var graficoVilla = document.getElementById("puntajeVilla").getContext("2d");
                            var puntajeVilla = new Chart(graficoVilla, {
                                type: 'bar',
                                data: {
                                    labels: [<?php echo $dataFecha; ?>],
                                    backgroundColor: ["rgba(0,0,0,0.2)"],
                                    datasets: [{
                                        label: 'Puntaje UNFV',
                                        data: [<?php echo $dataPuntajeVilla; ?>],
                                        backgroundColor: [ <?php echo $colorVilla; ?> ],
                                        borderColor: [ <?php echo $colorVilla; ?> ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    /* maintainAspectRatio: false, */
                                    scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <canvas id="puntajeCallao" width="1" height="1"></canvas>
                        <script>
                            var graficoCallao = document.getElementById("puntajeCallao").getContext("2d");
                            var graficoCallao = new Chart(graficoCallao, {
                                type: 'bar',
                                data: {
                                    labels: [<?php echo $dataFecha; ?>],
                                    backgroundColor: ["rgba(0,0,0,0.2)"],
                                    datasets: [{
                                        label: 'Puntaje UNAC',
                                        data: [<?php echo $dataPuntajeCallao; ?>],
                                        backgroundColor: [ <?php echo $colorCallao; ?> ],
                                        borderColor: [ <?php echo $colorCallao; ?> ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    /* maintainAspectRatio: false, */
                                    scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection