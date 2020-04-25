@extends('Academia.plantillaAcademia')

@section('content')
<div class="row" style="opacity: 1;">
    <div class="col-lg-12">
        <h2>Mis notas</h2>
    </div>
</div>
<div class="row" style="opacity: 1;">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte de mis notas</h3>
                <ul class="panel-controls">
                    <li>
                        <a href="{{ route('academia.reporteNotasDescargar') }}" target="_blank" title="Descargar en PDF">
                            <button id="exportar" class="pull-right btn btn-primary" type="button">
                                <i class="far fa-file-pdf"></i>
                                Descargar en PDF
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tablaHorarioAsistencia" class="table table-bordered table-condensed table-hover">
                        <thead>
                            <tr class="success">
                                <th class="text-center" rowspan="2">Fecha</th>
                                <th class="text-center" colspan="3">Puntajes</th>
                            </tr>
                            <tr class="success">
                                <th class="text-center" rowspan="2">UNMSM</th>
                                <th class="text-center" rowspan="2">UNFV</th>
                                <th class="text-center" rowspan="2">UNAC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($examen->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="4"><span class="label label-danger">No existen registros de notas.</span></td>
                                </tr>
                            @else
                                @php
                                    $dataFecha = "";
                                    $dataPuntajeSM = "";
                                @endphp
                                @foreach ($examen as $item)
                                    @php
                                        $dataFecha .= "\"".date('d/m/Y', strtotime($item->fecha))."\",";
                                        $dataPuntajeSM .= "\"".$item->puntajeSM."\",";
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($item->fecha)) }}</td>
                                        <td class="text-center">{{ $item->puntajeSM }}</td>
                                        <td class="text-center">{{ $item->puntajeVilla }}</td>
                                        <td class="text-center">{{ $item->puntajeCallao }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection