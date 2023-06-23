@section('title', 'Proyectos')
<x-app-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Mis Proyectos
                            </h2>
                            <p style="font-size: 10px">Proyectos en los que participas</p>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto">
                            <a href="{{ route('dashboard') }}" class="btn btn-azure" title="Inicio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home m-0"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Crear Proyecto
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <ul class="nav nav-bordered mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Ver todos</a>
                        </li>
                    </ul>
                    @if (count($proyectos) > 0)
                        <div class="row row-cards">
                            @foreach ($proyectos as $proyecto)
                                <div class="col-lg-12 mt-1 mb-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    @if ($proyecto->url)
                                                        <img src="{{ asset('storage/' . $proyecto->url) }}"
                                                            alt="Food Deliver UI dashboards" class="rounded">
                                                    @else
                                                        <img src="{{ asset('/assets/img/image-default.jpg') }}"
                                                            alt="Food Deliver UI dashboards" class="rounded height-min">
                                                    @endif

                                                </div>
                                                <div class="col">
                                                    <h3 class="card-title mb-1">
                                                        <a href="{{ route('diagramas.index', $proyecto->id) }}"
                                                            class="text-reset">{{ $proyecto->nombre }}</a>
                                                    </h3>
                                                    <p class="mb-1" style="font-size: 10px">
                                                        @if ($proyecto->user_id == Auth::user()->id)
                                                            <span class="text-success">Dueño</span>
                                                        @else
                                                            <span class="text-info">participando</span>
                                                        @endif
                                                    </p>
                                                    <div class="text-muted">
                                                        {{ $proyecto->descripcion }}
                                                    </div>
                                                    <div class="text-muted">
                                                        Fecha de finalizacion:
                                                        {{ Carbon\Carbon::parse($proyecto->fecha_fin)->format('Y-m-d H:i') }}
                                                    </div>
                                                    @if ($proyecto->terminado == 1)
                                                        <div class="text-success">
                                                            Proyecto terminado!
                                                        </div>
                                                    @elseif($proyecto->fecha_fin > Carbon\Carbon::now())
                                                        <div class="text-success">
                                                            Tiempo restante: {{ $proyecto->tiempoRestante() }}
                                                        </div>
                                                    @else
                                                        <div class="text-danger">
                                                            Estas retrasado por: {{ $proyecto->tiempoRestante() }}
                                                        </div>
                                                    @endif
                                                    {{-- <div class="text-muted">
                                                        {{ Carbon\Carbon::createFromTimestamp(strtotime($proyecto->fecha_fin))->diff(\Carbon\Carbon::now())->days }}
                                                    </div> --}}
                                                    <div class="mt-3">
                                                        <div class="row g-2 align-items-center">
                                                            <div class="col-auto">
                                                                Progreso:
                                                                {{ $proyecto->porcentajeTerminado() }}%
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar"
                                                                        style="width: {{ $proyecto->porcentajeTerminado() }}%"
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
                                                        @if (count($proyecto->usuarios) > 1)
                                                            <div class="avatar-list avatar-list-stacked">
                                                                @foreach ($proyecto->usuarios as $usuario)
                                                                    @if ($usuario->url)
                                                                        <span
                                                                            class="avatar avatar-xs avatar-rounded cursor-help"
                                                                            style="background-image: url({{ asset('storage/' . $usuario->url) }})"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-html="true"
                                                                            data-bs-content="<p class='mb-0'>{{ $usuario->name }} {{ $usuario->id == $proyecto->id ? ' - Dueño' : ' - Participante' }}</p><p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>">
                                                                        </span>
                                                                    @else
                                                                        <span
                                                                            class="avatar avatar-xs avatar-rounded cursor-help"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-html="true"
                                                                            data-bs-content="<p class='mb-0'>{{ $usuario->name }} {{ $usuario->id == $proyecto->id ? ' - Dueño' : ' - Participante' }}</p>
                                                                            <p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>
                                                                            ">{{ Str::substr($usuario->name, 0, 2) }}</span>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <span class="h6">Sin usuarios</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-auto row">
                                                    <div class="col-auto dropdown">
                                                        <a href="#" class="btn-action"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            title="Opciones">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
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
                                                            <a href="{{ route('diagramas.index', $proyecto->id) }}"
                                                                class="dropdown-item">Diagramas</a>
                                                            @if ($proyecto->user_id != Auth::user()->id)
                                                                <form
                                                                    action="{{ route('proyectos.declinar', $proyecto->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button class="dropdown-item text-red"
                                                                        type="submit">Declinar</button>
                                                                </form>
                                                            @endif
                                                            {{-- @endcan --}}
                                                            @if ($proyecto->user_id == Auth::user()->id)
                                                                <a href="{{ route('proyectos.edit', $proyecto->id) }}"
                                                                    class="dropdown-item">Editar
                                                                    Informacion</a>
                                                                <a href="{{ route('proyectos.usuarios', $proyecto->id) }}"
                                                                    class="dropdown-item">Administrar Acceso</a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    @if ($proyecto->user_id == Auth::user()->id)
                                                        <div class="col-auto">
                                                            <div class="btn-action">
                                                                <button class="switch-icon switch-icon-fade"
                                                                    data-bs-toggle="switch-icon" title="Favorito"
                                                                    onclick="favorito({{ $proyecto->id }})">
                                                                    @if ($proyecto->favorito == 1)
                                                                        <span class="switch-icon-a text-red mt-1">
                                                                            <i class="fa-solid fa-heart text-pink"></i>
                                                                        </span>
                                                                        <span class="switch-icon-b text-muted mt-1">
                                                                            <i
                                                                                class="fa-regular fa-heart text-pink"></i>
                                                                        </span>
                                                                    @else
                                                                        <span class="switch-icon-a text-red mt-1">
                                                                            <i
                                                                                class="fa-regular fa-heart text-pink"></i>
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
                                                                    onclick="terminado({{ $proyecto->id }})">
                                                                    @if ($proyecto->terminado == 1)
                                                                        <span class="switch-icon-a text-red mt-1">
                                                                            <i
                                                                                class="fa-solid fa-check text-success"></i>
                                                                        </span>
                                                                        <span class="switch-icon-b text-muted mt-1">
                                                                            <i
                                                                                class="fa-solid fa-xmark text-danger"></i>
                                                                        </span>
                                                                    @else
                                                                        <span class="switch-icon-b text-muted mt-1">
                                                                            <i
                                                                                class="fa-solid fa-check text-success"></i>
                                                                        </span>
                                                                        <span class="switch-icon-a text-red mt-1">
                                                                            <i
                                                                                class="fa-solid fa-xmark text-danger"></i>
                                                                        </span>
                                                                    @endif
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="card mt-1">
                            <div class="card-body pb-0">
                                <div class="pagination">
                                    {{ $eventos_a->links() }}
                                </div>
                            </div>
                        </div> --}}
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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

        </div>

        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Proyecto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row row-cards">
                                <div class="col-lg-6">

                                    <div class="containerdd" style="max-width: 300px">
                                        <h3 class="text-white">Subir Imagen</h3>
                                        <div class="drag-area" style="height: 100px">
                                            <div class="icono" style="font-size: 10px">
                                                <i class="fas fa-images"></i>
                                            </div>
                                            <span class="header" style="font-size: 10px">Arrastrar y soltar en el
                                                area</span>
                                            <span class="header" style="font-size: 10px">o <span class="buttonDrop"
                                                    style="font-size: 12px">navega</span></span>
                                            <span class="support" style="font-size: 10px">Support: JPEG, JPG,
                                                PNG</span>
                                        </div>
                                        <input type="file" id="img" name="url" class="form-control"
                                            accept=".jpge,.jpg,.png" hidden>
                                    </div>


                                </div>
                                <div class="col-lg-6 row mt-3">
                                    <div class="row">
                                        <div class="mb-1">
                                            <label class="form-label">Nombre</label>
                                            <input name="nombre" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de Finalizacion</label>
                                            <input name="fecha_fin" type="datetime-local" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Descripcion</label>
                                        <textarea name="descripcion" class="form-control" rows="3"></textarea>
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
                                Crear Proyecto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const dragArea = document.querySelector('.drag-area');
            const dragText = document.querySelector('.header');
            let button = document.querySelector('.buttonDrop');
            let input = document.getElementById('img');

            let file;

            button.onclick = () => {
                input.click();
            };

            input.addEventListener('change', function() {
                file = this.files[0];
                dragArea.classList.add('active');
                displayFile();
            });

            dragArea.addEventListener('dragover', (event) => {
                event.preventDefault();
                dragText.textContent = 'Soltar imagen';
                dragArea.classList.add('active');
                // console.log('documento dentro');
            });

            dragArea.addEventListener('dragleave', () => {
                dragText.textContent = 'Arrastra la imagen al area';
                dragArea.classList.remove('active');
                // console.log('Archivo fuera del area');
            });

            dragArea.addEventListener('drop', (event) => {
                event.preventDefault();
                file = event.dataTransfer.files[0];
                displayFile();
            });

            function displayFile() {
                let fileType = file.type;
                // console.log(fileType);
                let validExtension = ['image/png', 'image/jpg', 'image/jpeg'];
                if (validExtension.includes(fileType)) {
                    let fileReader = new FileReader();
                    fileReader.onload = () => {
                        let fileURL = fileReader.result;
                        // console.og(fileURL);
                        let tag = `<img src="${fileURL}" alt="">`;
                        dragArea.innerHTML = tag;
                        input.hidden = false;
                        console.log(file);
                        // input.value = `${fileReader.filename}`;
                        console.log(input.value);
                    }
                    fileReader.readAsDataURL(file);
                } else {
                    alert('El archivo seleccionado no es una imagen');
                    dragArea.classList.remove('active');
                }
                // console.log('El archivo fue enviando en el area drag')
            };

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

            function terminado(proyecto_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('proyectos/terminado') }}",
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
