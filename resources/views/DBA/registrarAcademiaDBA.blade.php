@extends('DBA.homeDBA')

@section('content')
<form method="POST" action="{{ route('academia.store') }}">
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
        <label for="DNI">DNI: </label>
        <input type="text" class="validar-numeros" minlength="8" maxlength="8" name="DNI" id="DNI" placeholder="DNI" required autofocus>
    </p>
    <p>
        <label for="apellidoPaterno">Apellido Paterno: </label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" maxlength="30" placeholder="apellido paterno" required>
    </p>
    <p>
        <label for="apellidoMaterno">Apellido Materno: </label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" maxlength="30" placeholder="apellido materno" required>
    </p>
    <p>
        <label for="nombres">Nombres: </label>
        <input type="text" name="nombres" id="nombres" maxlength="40" placeholder="nombres" required>
    </p>
    <p>
        <label for="fechaNacimiento">Fecha de nacimiento: </label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento" required>
    </p>
    <p><label>Sexo: </label></p>
    <p>
        <input type="radio" name="sexo" id="hombre" value="H" checked>
        <label for="hombre">
            Hombre
        </label>
    </p>
    <p>
        <input type="radio" name="sexo" id="mujer" value="M">
        <label for="mujer">
            Mujer
        </label>
    </p>
    <p>
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion" maxlength="100" required>
    </p>
    <p>
        <label for="email">Correo: </label>
        <input type="email" name="email" id="email" placeholder="example@example.com" required>
    </p>
    <p>
        <label for="telefono">Fijo: </label>
        <input type="text" class="validar-numeros" name="telefono" id="telefono" minlength="7" maxlength="7" placeholder="teléfono fijo">
    </p>
    <p>
        <label for="celular">Móvil: </label>
        <input type="text" class="validar-numeros" pattern="[9][0-9]{8}" name="celular" id="celular" minlength="9" maxlength="9" placeholder="teléfono móvil">
    </p>
    <script>
        onload = function() {
            var ele = document.querySelectorAll('.validar-numeros');
            for (let index = 0; index < ele.length; index++) {
                ele[index].onkeypress = function(e) {
                    if (isNaN(this.value + String.fromCharCode(e.charCode))) {
                        return false;
                    }
                }
                ele[index].onpaste = function(e) {
                    e.preventDefault();
                }
            }
        }
    </script>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
@endsection