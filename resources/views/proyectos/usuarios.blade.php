@section('title', 'Usuarios del Proyecto')
<x-app-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Administrar Usuarios
                            </h2>
                            <p style="font-size: 10px">Proyecto: {{ $proyecto->nombre }}</p>
                        </div>
                        <!-- Page title actions -->

                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <span class="d-none d-sm-inline">
                                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">
                                    Volver
                                </a>
                            </span>
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-forward" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" />
                                    <path d="M3 6l9 6l9 -6" />
                                    <path d="M15 18h6" />
                                    <path d="M18 15l3 3l-3 3" />
                                  </svg>
                                Invitar por Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <ul class="nav nav-bordered mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Administrar</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('eventos.favoritos') }}">Favoritos</a>
                        </li> --}}
                    </ul>
                    <div class="col-12 row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Usuarios</h3>
                                </div>
                                @if (count($usuarios) > 0)
                                    @foreach ($usuarios as $usuario)
                                        <div class="list-group list-group-flush list-group-hoverable">
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <a href="#">
                                                            @if ($usuario->url)
                                                                <span class="avatar avatar-sm"
                                                                    style="background-image: url({{ asset('storage/' . $usuario->url) }})"></span>
                                                            @else
                                                                <span
                                                                    class="avatar avatar-sm">{{ Str::substr($usuario->name, 0, 2) }}</span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#"
                                                            class="text-reset d-block">{{ $usuario->name }}</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            {{ $usuario->email }}
                                                        </div>
                                                    </div>
                                                    @if ($usuario->id != $proyecto->user_id)
                                                        <div class="col-auto">
                                                            <div class="row">
                                                                <form
                                                                    action="{{ route('proyectos.banear', $proyecto->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="col-auto">
                                                                        <input type="text" hidden name="user_id"
                                                                            value="{{ $usuario->id }}">
                                                                    </div>
                                                                    <div class="col-auto px-1">
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Banear
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                                        <a href="{{-- {{ route('eventos.create') }} --}}" class="btn btn-primary">
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
                                                            Crear Proyecto
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Agregar Usuario</h3>
                                </div>
                                <div class="card-body">
                                    <div class="g-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Seleccionar el usuario</label>
                                                {{-- <select class="form-select" name="usuario_id"> --}}
                                                @foreach ($usuariosV as $usuarioV)
                                                    <div class="list-group list-group-flush list-group-hoverable">
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <a href="#">
                                                                        @if ($usuarioV->url)
                                                                            <span class="avatar avatar-sm"
                                                                                style="background-image: url({{ asset('storage/' . $usuarioV->url) }})"></span>
                                                                        @else
                                                                            <span
                                                                                class="avatar avatar-sm">{{ Str::substr($usuarioV->name, 0, 2) }}</span>
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="col text-truncate">
                                                                    <a href="#"
                                                                        class="text-reset d-block">{{ $usuarioV->name }}</a>
                                                                    <div
                                                                        class="d-block text-muted text-truncate mt-n1">
                                                                        {{ $usuarioV->email }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    @if (count(
                                                                        $usuarioV->proyectos_part()->where('proyecto_id', $proyecto->id)->get()) > 0)
                                                                        @if ($usuarioV->id == $proyecto->user_id)
                                                                            <div class="row">
                                                                                <div class="col-auto px-1">
                                                                                    <a href="#"
                                                                                        class="btn btn-orange disabled">
                                                                                        Dueño
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <a href="#"
                                                                                class="btn btn-info disabled">
                                                                                Participando
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <form
                                                                            action="{{ route('notificaciones.store') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="integer" hidden
                                                                                value="{{ $proyecto->id }}"
                                                                                name="proyecto_id">
                                                                            <input type="integer" hidden
                                                                                value="{{ $usuarioV->id }}"
                                                                                name="user_id">

                                                                            <button class="btn btn-success"
                                                                                type="submit">
                                                                                Invitar
                                                                            </button>
                                                                        </form>
                                                                        {{-- @endif --}}
                                                                    @endif


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="card mt-1">
                                                    <div class="card-body pb-0">
                                                        <div class="pagination">
                                                            {{ $usuariosV->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invitar por Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('notificar') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Correo</label>
                                            <input name="email" type="email" class="form-control">
                                        </div>
                                        <input type="integer" hidden value="{{ $proyecto->id }}" name="proyecto_id">
                                    </div>
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
                                Invitar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
