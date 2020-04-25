@extends('Academia.plantillaAcademia')

@section('content')
<!-- Cabezera -->
<div class="row" style="opacity: 1;">
    <div class="col-lg-12">
        <h2>Inicio</h2>
    </div>
</div>
<!-- Contenido -->
<div class="row" id="user-profile" style="opacity: 1;">
    <div class="col-lg-4 col-md-12 col-xs-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2>{{ Auth::user()->apellidoPaterno." ".Auth::user()->apellidoMaterno.", ".Auth::user()->nombres }}</h2>
            </header>
            <div class="main-box-body clearfix">
                <div class="profile-status">
                    <i class="fa fa-circle green"></i>
                    En línea
                </div>
                @php
                    $foto = "img/fotos/academia/".Auth::user()->DNI.".png";
                @endphp
                <img src="{{ asset($foto) }}" alt="Foto del alumno" class="profile-img img-responsive center-block" style="max-width: 220px; max-height: 220px;">
                <div class="profile-label">
                    <span class="btn btn-info" style="border-radius: 8px; font-size: 15px;">
                        <i class="far fa-id-card"></i>
                        {{ Auth::user()->DNI }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-xs-12">
        <div class="main-box clearfix">
            <div class="tabs-wrapper profile-tabs">
                <ul class="nav nav-tabs" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <li class="active"><a href="#" data-toggle="tab">Información personal</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab-newsfeed">
                        <div class="col-lg-offset-1 col-lg-9 col-md-offset-2 col-md-9 col-xs-12">
                            <table class="table" style="font-size: 15px">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><i class="far fa-id-card"></i></td>
                                        <td><strong>DNI</strong></td>
                                        <td><span>{{ Auth::user()->DNI }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="far fa-calendar-alt"></i></td>
                                        <td><strong>Fecha de nacimiento</strong></td>
                                        <td><span>{{ Auth::user()->fechaNacimiento }}</span></td>
                                    </tr>
                                    <tr>
                                        @if (Auth::user()->sexo == 'H')
                                            <td class="text-center"><i class="fas fa-male"></i></td>
                                            <td><strong>Sexo</strong></td>
                                            <td><span>Hombre</span></td>
                                        @elseif (Auth::user()->sexo == 'M') 
                                            <td class="text-center"><i class="fas fa-female"></i></td>
                                            <td><strong>Sexo</strong></td>
                                            <td><span>Mujer</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fas fa-map-marker-alt"></i></td>
                                        <td><strong>Dirección</strong></td>
                                        <td><span>{{ Auth::user()->direccion }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fas fa-envelope"></i></td>
                                        <td><strong>Correo electrónico</strong></td>
                                        <td><span>{{ Auth::user()->email }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fas fa-phone"></i></td>
                                        <td><strong>Teléfono fijo</strong></td>
                                        <td><span>{{ Auth::user()->telefono }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fas fa-mobile-alt"></i></td>
                                        <td><strong>Teléfono móvil</strong></td>
                                        <td><span>{{ Auth::user()->celular }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection