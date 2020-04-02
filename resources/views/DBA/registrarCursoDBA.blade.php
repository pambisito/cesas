@extends('DBA.homeDBA')

@section('content')
<form method="POST" action="{{ route('curso.store') }}">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Estudiante ya registrado</li>
            @endforeach
        </ul>
    </div>
    @endif
    <p>
        <label for="ID">ID: </label>
        <input type="text" maxlength="3" name="ID" id="ID" value="{{ old('ID') }}" required autofocus>
    </p>
    <p>
        <label for="nombreCurso">Nombre del curso: </label>
        <input type="text" maxlength="30" name="nombreCurso" id="nombreCurso" value="{{ old('nombreCurso') }}" required>
    </p>
    <p>
        <label for="ano">Año de estudio: </label>
        <select name="ano" id="ano" required>
            <option value="1">1ro secundaria</option>
            <option value="2">2do secundaria</option>
            <option value="3">3ro secundaria</option>
            <option value="4">4to secundaria</option>
            <option value="5">5to secundaria</option>
        </select>
    </p>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
@endsection