@extends('welcome')

@section('content')
<section id="app">
    <div class="container hidden-xs hidden-sm">
        <nav class="Main-menu" id="js-affix-cycle">
            <div class="menu-ciclos-menu-container">
                <ul id="menu-ciclos-menu" class="list-inline text-center Menu">
                   <!--  <li id="menu-item-14371" class="menu-item menu-item-type-post_type menu-item-object-cycles current-menu-item menu-item-14371">
                        <a href="#">Anual San Marcos</a>
                    </li> -->
                    <li id="menu-item-14370" class="menu-item menu-item-type-post_type menu-item-object-cycles menu-item-14370">
                        <a href="{{ route('ciclo1') }}">Semestral San Marcos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <main id="sb-site">
        <section class="Main Main--cycle">
            <article class="Main-page Main-page--cycle ">
                <div class="container">
	                <div class="row">
		                <div class="col-md-8">
			                <h2 class="Main-title text-uppercase h4">Semestral San Marcos</h2>
			                <p><span>Dirigido a estudiantes que recién empiezan su preparación académica preuniversitaria, con miras a 
                                        postular a la Universidad Nacional Mayor de San Marcos. Este ciclo se clasifica en:</span></p>
                            <p style="padding-left: 30px;">
                                <strong>Áreas ABC: </strong>
                                Ciencias de la Salud; Ciencias Básicas e Ingenierías.
                                <span style="color: #808080;"> </span>
                            </p>
                            <p style="padding-left: 30px;">
                                <strong>Áreas DE: </strong>
                                Ciencias Económicas y de la Gestión, Humanidades y Ciencias Jurídicas y Sociales.
                                <span style="color: #808080;"></span>
                            </p>

                            <h2 class="Main-title text-uppercase h4">Horarios y Turnos</h2>
                            <p>* Mañana: De Lun. a Sáb. de 8 a.m. - 1 p.m. (2 veces a la semana tendrán una hora más de clase).</p>
				
                            <h4 class="Main-title text-uppercase">Costo</h4>
                            <p>400 csoacmoasmsa</p>
		                </div>
	                </div>
                </div>
            </article>
        </section>
    </main>
</section>
@endsection