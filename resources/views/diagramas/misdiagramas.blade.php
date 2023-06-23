@section('title', 'Mis Diagramas')
<x-app-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Diagramas
                            </h2>
                            <p style="font-size: 10px">Diagramas en los que participas</p>

                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <a href="{{route('dashboard')}}" class="btn btn-azure" title="Inicio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home m-0" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                  </svg>
                            </a>
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Agregar Diagrama
                            </a>
                        </div>

                    </div>
                </div>

                <div class="page-body">
                    <div class="container-xl">
                        <ul class="nav nav-bordered mb-4">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Ver todos</a>
                            </li>
                            {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('eventos.favoritos') }}">Favoritos</a>
                        </li> --}}
                        </ul>
                        @if (count($diagramas) > 0)
                            <div class="row row-cards">
                                @foreach ($diagramas as $diagrama)
                                    <div class="col-lg-12 mt-1 mb-1">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ asset('assets/img/image-preview.svg') }}"
                                                            alt="Food Deliver UI dashboards" class="rounded">
                                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-vector-bezier" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <rect x="3" y="14" width="4" height="4" rx="1" />
                                                            <rect x="17" y="14" width="4" height="4" rx="1" />
                                                            <rect x="10" y="6" width="4" height="4" rx="1" />
                                                            <path d="M10 8.5a6 6 0 0 0 -5 5.5" />
                                                            <path d="M14 8.5a6 6 0 0 1 5 5.5" />
                                                            <line x1="10" y1="8" x2="4" y2="8" />
                                                            <line x1="20" y1="8" x2="14" y2="8" />
                                                            <circle cx="3" cy="8" r="1" />
                                                            <circle cx="21" cy="8" r="1" />
                                                          </svg> --}}
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="card-title mb-1">
                                                            <a href="#"
                                                                class="text-reset">{{ $diagrama->nombre }}</a>
                                                        </h3>
                                                        <p class="mb-1" style="font-size: 10px">Proyecto: {{ $diagrama->proyecto->nombre }}</p>
                                                        <p class="mb-1" style="font-size: 10px">
                                                            @if ($diagrama->proyecto->user_id == Auth::user()->id)
                                                            <span class="text-success">Dueño</span>
                                                            @else
                                                            <span class="text-info">participando</span>
                                                            @endif
                                                        </p>
                                                        <div class="text-muted">
                                                            {{ $diagrama->descripcion }}
                                                        </div>
                                                        <div class="text-muted">
                                                            @switch($diagrama->tipo)
                                                                @case(1)
                                                                    Nivel 1: Diagrama de Contexto
                                                                @break

                                                                @case(2)
                                                                    Nivel 2: Diagrama de Contenedores
                                                                @break

                                                                @case(3)
                                                                    Nivel 3: Diagrama de Componentes
                                                                @break

                                                                @default
                                                                    Nivel 4: Diagrama de Codigo
                                                            @endswitch
                                                        </div>
                                                        <div class="mt-3">
                                                            <div class="row g-2 align-items-center">
                                                                <div class="col-auto">
                                                                    {{$diagrama->terminado? '100': '0'}}%
                                                                </div>
                                                                <div class="col">
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar" style="width: {{$diagrama->terminado? '100': '0'}}%"
                                                                            role="progressbar" aria-valuenow="25"
                                                                            aria-valuemin="0" aria-valuemax="100"
                                                                            aria-label="25% Complete">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="datagrid-title">Lista de Usuarios</div>
                                                        <div class="datagrid-content">
                                                            @if (count($diagrama->usuarios) > 1)
                                                                <div class="avatar-list avatar-list-stacked">
                                                                    @foreach ($diagrama->usuarios as $usuario)
                                                                        @if ($usuario->id != $diagrama->proyecto->user_id)
                                                                            @if ($usuario->url)
                                                                                <span
                                                                                    class="avatar avatar-xs avatar-rounded cursor-help"
                                                                                    style="background-image: url({{ asset('storage/' . $usuario->url) }})"
                                                                                    data-bs-toggle="popover"
                                                                                    data-bs-placement="top"
                                                                                    data-bs-html="true"
                                                                                    data-bs-content="<p class='mb-0'>{{ $usuario->name }} - Participante</p><p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>">
                                                                                </span>
                                                                            @else
                                                                                <span
                                                                                    class="avatar avatar-xs avatar-rounded cursor-help"
                                                                                    data-bs-toggle="popover"
                                                                                    data-bs-placement="top"
                                                                                    data-bs-html="true"
                                                                                    data-bs-content="<p class='mb-0'>{{ $usuario->name }} - Participante</p>
                                                                                <p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>
                                                                                ">{{ Str::substr($usuario->name, 0, 2) }}</span>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <span class="h6">Sin usuarios</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn-action"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <circle cx="12" cy="12"
                                                                        r="1" />
                                                                    <circle cx="12" cy="19"
                                                                        r="1" />
                                                                    <circle cx="12" cy="5"
                                                                        r="1" />
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                {{-- @can('verImagenesAgregadas') --}}
                                                                <a href="{{-- {{ route('diagramas.index', $proyecto->id) }} --}}"
                                                                    class="dropdown-item">Editar
                                                                    Diagrama</a>
                                                                {{-- @endcan --}}
                                                                @if ($diagrama->proyecto->user_id == Auth::user()->id)
                                                                    <a href="{{ route('diagramas.edit', $diagrama->id) }}"
                                                                    class="dropdown-item">Editar
                                                                    Información</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="btn-action">
                                                            <button class="switch-icon switch-icon-fade"
                                                                data-bs-toggle="switch-icon" title="Favorito"
                                                                onclick="favorito({{ $diagrama->id }})">
                                                                @if ($diagrama->favorito == 1)
                                                                    <span class="switch-icon-a text-red mt-1">
                                                                        <i class="fa-solid fa-heart text-pink"></i>
                                                                    </span>
                                                                    <span class="switch-icon-b text-muted mt-1">
                                                                        <i class="fa-regular fa-heart text-pink"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="switch-icon-a text-red mt-1">
                                                                        <i class="fa-regular fa-heart text-pink"></i>
                                                                    </span>
                                                                    <span class="switch-icon-b text-muted mt-1">
                                                                        <i class="fa-solid fa-heart text-pink"></i>
                                                                    </span>
                                                                @endif
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="btn-action">
                                                            <button class="switch-icon switch-icon-flip"
                                                                data-bs-toggle="switch-icon" title="Estado"
                                                                onclick="terminado({{ $diagrama->id }})">
                                                                @if ($diagrama->terminado == 1)
                                                                    <span class="switch-icon-a text-red mt-1">
                                                                        <i class="fa-solid fa-check text-success"></i>
                                                                    </span>
                                                                    <span class="switch-icon-b text-muted mt-1">
                                                                        <i class="fa-solid fa-xmark text-danger"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="switch-icon-b text-muted mt-1">
                                                                        <i class="fa-solid fa-check text-success"></i>
                                                                    </span>
                                                                    <span class="switch-icon-a text-red mt-1">
                                                                        <i class="fa-solid fa-xmark text-danger"></i>
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
                                        {{ $diagramas->links() }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row row-cards">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="empty">
                                            <div class="empty-img"><img
                                                    src="{{ asset('/back/static/illustrations/undraw_quitting_time_dm8t.svg') }}"
                                                    height="128" alt="">
                                            </div>
                                            <p class="empty-title">No tienes proyectos para administrar</p>
                                            <p class="empty-subtitle text-muted">
                                                Comienza administrando un proyecto, creando uno.
                                            </p>
                                            <div class="empty-action">
                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-report">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="12" y1="5" x2="12"
                                                            y2="19" />
                                                        <line x1="5" y1="12" x2="19"
                                                            y2="12" />
                                                    </svg>
                                                    Crear Diagrama
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Proyecto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('diagramas.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input name="nombre" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Cargar diagrama</label>
                                            <select class="form-select" name="diagrama_id">
                                                <option value="nuevo" selected>Nuevo</option>
                                                @foreach (Auth::user()->misDiagramas as $diagrama)
                                                    <option value="{{$diagrama->id}}">{{$diagrama->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Seleccionar Proyecto</label>
                                            <select class="form-select" name="proyecto_id">
                                                @foreach (Auth::user()->proyectos as $proyecto)
                                                    <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="form-label">Tipo de Diagrama</label>
                            <div class="form-selectgroup-boxes row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="tipo" value="1"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Nivel 1</span>
                                                <span class="d-block text-muted">Diagrama de Contexto</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="tipo" value="2"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Nivel 2</span>
                                                <span class="d-block text-muted">Diagrama de Contenedores</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="tipo" value="3"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Nivel 3</span>
                                                <span class="d-block text-muted">Diagrama de Componentes</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="tipo" value="4"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Nivel 4</span>
                                                <span class="d-block text-muted">Diagrama de Codigo</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Descripcion</label>
                                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                                    {{-- <input type="text" name="proyecto_id" value="{{ $proyecto->id }}" hidden> --}}
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary bg-danger text-white"
                                data-bs-dismiss="modal">
                                Cancelar
                            </a>
                            <button class="btn btn-primary ms-auto" type="submit" data-bs-dismiss="modal">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Crear Diagrama
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function favorito(proyecto_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('diagramas/favorito') }}",
                    data: {
                        id: proyecto_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function() {
                        /* console.log('protasdas'); */
                        /* window.location('/proyectos'); */
                    },
                });
            };

            function terminado(proyecto_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('diagramas/terminado') }}",
                    data: {
                        id: proyecto_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function() {
                        /* console.log('protasdas'); */
                        /* window.location('/proyectos'); */
                    },
                });
            };
        </script>
    @endpush
</x-app-layout>
