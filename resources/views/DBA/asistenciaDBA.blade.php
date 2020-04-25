@extends('DBA.homeDBA')

@section('content')
<form method="POST" action="{{ route('asistencia.store') }}">
    @csrf

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>
                            @php
                                $fecha = date("d / m / Y");
                                print_r($fecha);
                            @endphp
                        </h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Asistencia</th>
                                <th scope="col">Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cantidad = 0;
                                @endphp
                                @foreach ($persona as $item)
                                    @php
                                        $cantidad = $cantidad + 1;
                                    @endphp
                                    <tr>
                                        
                                        <td scope="row">{{ $item->user->apellidoPaterno." ".$item->user->apellidoMaterno }}</td>
                                        <td>{{ $item->user->nombres }}</td>
                                        <td>
                                            <select name="tipo[]" id="tipo" required>
                                                <option value="0">Asistió</option>
                                                <option value="1">Faltó</option>
                                            </select>
                                        </td>
                                        <td><textarea name="observacion[]" id="observacion" cols="40" rows="3"></textarea></td>
                                        <input type="hidden" name="DNI[]" value="{{ $item->user->DNI }}">
                                    </tr>
                                @endforeach
                                <input type="hidden" name="cantidad" value="{{$cantidad}}">
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