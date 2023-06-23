<section id="pricing" class="pricing section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Precios</h2>
            <p>Accede a nuestros diferentes planes, y obten el software que hara de tu evento una ocasión para recordar
                toda la vida.</p>
        </div>

        <div class="row">
            {{-- @foreach ($planes as $plan) --}}
                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        {{-- <h3>{{ $plan->precio > 0 ? 'PLAN MENSUAL' : 'GRATIS' }}</h3>
                        <h4><sup>$</sup>{{ $plan->precio }}<span> / mes</span></h4>
                        <h3>{{ $plan->nombre }}</h3> --}}
                        <ul>
                            <li>
                                <i class="fa-solid fa-check text-success"></i>
                                Comprar imagenes
                            </li>
                            <li>
                                <i class="fa-solid fa-check text-success"></i>
                                Gestionar imagenes
                            </li>
                           {{--  <li class="{{ $plan->n_imagenes > 0 ? '' : 'na' }}">
                                Cantidad de imagenes: {{ $plan->n_imagenes }}
                            </li>
                            <li class="{{ $plan->n_eventos > 0 ? '' : 'na' }}">Gestionar Eventos</li>
                            <li class="{{ $plan->n_eventos > 0 ? '' : 'na' }}">
                                Cantidad de Eventos: {{ $plan->n_eventos }}
                            </li> --}}
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{-- {{route('registrar',$plan->id)}} --}}" class="btn-buy">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                <div class="box" data-aos="zoom-in" data-aos-delay="300">
                    <span class="advanced">Advanced</span>
                    <h3>PLAN EMPRESARIAL</h3>
                    <h4><sup>>$</sup>45<span> / mes</span></h4>
                    <h3>Empresarial</h3>
                    <ul>
                        <li>Compra de imagenes</li>
                        <li>Gestion completa de imagenes</li>
                        <li>Gestion completa de eventos</li>
                        <li>Gestion de software</li>
                        <li>Gestion de informacion</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#contact" class="btn-buy">Contactanos</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
