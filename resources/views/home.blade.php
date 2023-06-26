@section('title', 'Home')
<x-app-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Inicio
                            </div>
                            <h2 class="page-title">
                                UML Software
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">

                                <a href="{{ route('proyectos.index') }}" class="btn btn-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-layout-2" width="44" height="44"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="6" height="5"
                                            rx="2" />
                                        <rect x="4" y="13" width="6" height="7"
                                            rx="2" />
                                        <rect x="14" y="4" width="6" height="7"
                                            rx="2" />
                                        <rect x="14" y="15" width="6" height="5"
                                            rx="2" />
                                    </svg>
                                    Proyectos
                                </a>

                                <a href="{{ route('profile.index') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings" width="44" height="44"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    Mi cuenta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards mb-2">

                        <div class="col-lg-6">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Referencias UML</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="" style="border: 0">
                                                        <img class="d-block h-auto" alt=""
                                                            src="https://th.bing.com/th/id/OIP.hDoZJKJ6koY71SoBlDlAKwHaF4?pid=ImgDet&rs=1">
                                                    </div>
                                                    <div class="carousel-caption-background d-none d-md-block"></div>
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h3>Diagrama de Clases</h3>
                                                        <p>Diagrama elemental para el proyecto
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="" style="border: 0">
                                                        <img class="d-block w-max" alt=""
                                                            src="https://th.bing.com/th/id/R.53cff07f94a1e65676323a7ba2f7576f?rik=hIgS7t4uWP9KWA&pid=ImgRaw&r=0">
                                                    </div>
                                                    <div class="carousel-caption-background d-none d-md-block"></div>
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h3>Script soporte</h3>
                                                        <p>Generador de scripts
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                            </div>

                                            <a class="carousel-control-prev" href="#carousel-captions" role="button"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel-captions" role="button"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Proyectos Favoritos</h3>
                                </div>
                                <div class="card-body">
                                    @if (count($proyectos) > 0)
                                        <div class="row row-cards">
                                            @foreach ($proyectos as $proyecto)
                                                <div class="col-12">
                                                    <div class="card card-sm">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-2">
                                                                    @if ($proyecto->url)
                                                                        <img src="{{ asset('storage/' . $proyecto->url) }}"
                                                                            alt="Food Deliver UI dashboards"
                                                                            class="rounded">
                                                                    @else
                                                                        <img src="{{ asset('/assets/img/image-default.jpg') }}"
                                                                            alt="Food Deliver UI dashboards"
                                                                            class="rounded height-min">
                                                                    @endif
                                                                </div>

                                                                <div class="col">
                                                                    <div class="font-weight-medium">
                                                                        <a href="{{ route('diagramas.index', $proyecto->id) }}"
                                                                            title="ver diagramas">
                                                                            {{ $proyecto->nombre }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        {{ $proyecto->calificacion }}
                                                                    </div>
                                                                </div>

                                                                <div class="col-auto">
                                                                    <div class="btn-action">
                                                                        <button class="switch-icon switch-icon-fade"
                                                                            data-bs-toggle="switch-icon"
                                                                            title="Favorito"
                                                                            onclick="favorito({{ $proyecto->id }})">
                                                                            @if ($proyecto->favorito == 1)
                                                                                <span
                                                                                    class="switch-icon-a text-red mt-1">
                                                                                    <i
                                                                                        class="fa-solid fa-heart text-pink"></i>
                                                                                </span>
                                                                                <span
                                                                                    class="switch-icon-b text-muted mt-1">
                                                                                    <i
                                                                                        class="fa-regular fa-heart text-pink"></i>
                                                                                </span>
                                                                            @else
                                                                                <span
                                                                                    class="switch-icon-a text-red mt-1">
                                                                                    <i
                                                                                        class="fa-regular fa-heart text-pink"></i>
                                                                                </span>
                                                                                <span
                                                                                    class="switch-icon-b text-muted mt-1">
                                                                                    <i
                                                                                        class="fa-solid fa-heart text-pink"></i>
                                                                                </span>
                                                                            @endif
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card mt-1">
                                            <div class="card-body pb-0">
                                                <div class="pagination">
                                                    {{ $proyectos->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <h6>No tienes Proyectos Favoritos</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-md">
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                        <line x1="10" y1="10" x2="10.01" y2="10" />
                                        <line x1="14" y1="10" x2="14.01" y2="10" />
                                        <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-10 mb-2">
                                        <h3 class="h1">¿Qué es UML?</h3>
                                        <div class="markdown text-muted">
                                            El Lenguaje Unificado de Modelado (UML) fue creado para forjar un lenguaje
                                            de modelado visual común y semántica y sintácticamente rico para la
                                            arquitectura, el diseño y la implementación de sistemas de software
                                            complejos, tanto en estructura como en comportamiento. UML tiene
                                            aplicaciones más allá del desarrollo de software, p. ej., en el flujo de
                                            procesos en la fabricación.

                                            Es comparable a los planos usados en otros campos y consiste en diferentes
                                            tipos de diagramas. En general, los diagramas UML describen los límites, la
                                            estructura y el comportamiento del sistema y los objetos que contiene.

                                            UML no es un lenguaje de programación, pero existen herramientas que se
                                            pueden usar para generar código en diversos lenguajes usando los diagramas
                                            UML. UML guarda una relación directa con el análisis y el diseño orientados
                                            a objetos.
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="col-12 row mb-2">
                                        <div class="col-3 row">
                                            <div><img src="https://th.bing.com/th/id/OIP.hDoZJKJ6koY71SoBlDlAKwHaF4?pid=ImgDet&rs=1"
                                                    alt=""></div>
                                        </div>
                                        <div class="col-8">
                                            <div class="ms-2">
                                                <h3 class="h1">UML y su función en el modelado y diseño orientados
                                                    a objetos</h3>
                                                <span class="text-muted">
                                                    <p class="mb-1">Hay muchos paradigmas o modelos para la
                                                        resolución de problemas en la informática, que es el estudio de
                                                        algoritmos y datos. Hay cuatro categorías de modelos para la
                                                        resolución de problemas: lenguajes imperativos, funcionales,
                                                        declarativos y orientados a objetos (OOP). En los lenguajes
                                                        orientados a objetos, los algoritmos se expresan definiendo
                                                        'objetos' y haciendo que los objetos interactúen entre sí. Esos
                                                        objetos son cosas que deben ser manipuladas y existen en el
                                                        mundo real. Pueden ser edificios, artefactos sobre un escritorio
                                                        o seres humanos.
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('scripts')
        <script>
            function favorito(proyecto_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('proyectos/favorito') }}",
                    data: {
                        id: proyecto_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function() {},
                });
            };
        </script>
    @endpush
</x-app-layout>
