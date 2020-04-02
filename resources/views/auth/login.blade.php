<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Academia Cesas SMP</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/compiled/login.css') }}">

    <!-- iconos del menú -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body id="login-page-full">
    <div class="form-constructor">
        <div class="card-login" style="background: none repeat scroll 0 0 #34495e;">
            <div class="card-body">
                <img src="" alt="Logo Academia Cesas Login"/>
            </div>
        </div>
        <div class="card-login">
            <form class="login text-center" role="form" action="{{ route('login') }}" method="POST" onsubmit="myButton.disabled = true; return true;">
                @csrf
                <div class="input-group">
                    <span class="input-group-addon"><span class="far fa-id-card"></span></span>
                    <input type="text" name="DNI" placeholder="DNI" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><span class="fas fa-unlock-alt"></span></span>
                    <input type="password" name="password" placeholder="contraseña" required>
                </div>            
                <div class="input-group">
                    <button type="submit" name="myButton"><span class="fa fa-sign-in-alt"></span> Iniciar sesión</button>
                </div>                 
            </form>
        </div> 
    </div>
</body>
</html>