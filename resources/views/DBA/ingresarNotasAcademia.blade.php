@extends('DBA.homeDBA')

@section('content')
<form method="POST" action="{{ route('examen.actualizarFecha') }}">
    @csrf  
    <select name="fechaUltima" id="fechaUltima">
        @foreach ($fechas as $fecha)
            @if ($fecha->fecha === $fechaUltima )
                <option value="{{ $fecha->fecha }}" selected>{{ $fecha->fecha }}</option>
            @else
                <option value="{{ $fecha->fecha }}">{{ $fecha->fecha }}</option>
            @endif
        @endforeach
    </select>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Actualizar fecha') }}
            </button>
        </div>
    </div>
</form>

<form method="POST" action="{{ action('ExamenController@actualizarNotas') }}">
    @csrf

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">San Marcos</th>
                                <th scope="col">Villareal</th>
                                <th scope="col">Callao</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cantidad = 0;
                                @endphp
                                @foreach ($persona as $item)
                                    @foreach ($item->examenes as $persona_examen)
                                        @if ($persona_examen->fecha == $fechaUltima)
                                            @php
                                                $cantidad = $cantidad + 1;
                                            @endphp
                                            <tr>
                                                <td scope="row">{{ $item->apellidoPaterno." ".$item->apellidoMaterno }}</td>
                                                <td>{{ $item->nombres }}</td>
                                                <td>
                                                    <input type="text" name="puntajeSM[]" id="puntajeSM" value="{{ $persona_examen->puntajeSM }}">
                                                </td>
                                                <td>
                                                    <input type="text" name="puntajeVilla[]" id="puntajeVilla" value="{{ $persona_examen->puntajeVilla }}">
                                                </td>
                                                <td>
                                                    <input type="text" name="puntajeCallao[]" id="puntajeCallao" value="{{ $persona_examen->puntajeCallao }}">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="DNI[]" id="DNI" value="{{ $persona_examen->DNI }}">
                                                    <input type="hidden" name="fecha[]" id="fecha" value="{{ $persona_examen->fecha }}">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                <input type="hidden" name="cantidad" value="{{ $cantidad }}">
                            </tbody>
                        </table>
                    {{-- fin card body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Terminar') }}
            </button>
        </div>
    </div>
</form>

@endsection