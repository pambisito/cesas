@extends('DBA.homeDBA')

@section('content')
<form method="POST" action="{{ route('examen.store') }}">
    @csrf

    <p>
        <label for="name">Fecha del examen: </label>
        <input type="date" name="fecha" id="fecha" min="<?php echo date('Y-m-d')?>" value="<?php echo date('Y-m-d')?>">
    </p>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Terminar') }}
            </button>
        </div>
    </div>
</form>
@endsection