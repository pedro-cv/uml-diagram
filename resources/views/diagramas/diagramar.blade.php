@section('title', 'Diagramar')
<x-app-layout>
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Proyecto: {{ $proyecto->nombre }}
                        </h2>
                        <p style="font-size: 10px">Diagrama: {{ $diagrama->nombre }}</p>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-13 col-md-auto ms-auto">
                        <div class="row">
                            <div class="col-auto mx-0 px-2">
                                <div class="datagrid-title">Lista de Usuarios</div>
                                <div class="datagrid-content">
                                    @if (count($diagrama->usuarios) > 1)
                                        <div class="avatar-list">
                                            @foreach ($diagrama->usuarios as $usuario)
                                                @if (auth()->user()->id != $usuario->id)
                                                    @if ($usuario->url)
                                                        <span class="avatar avatar-xs avatar-rounded cursor-help"
                                                            style="background-image: url({{ asset('storage/' . $usuario->url) }}); box-shadow: 0 0 0 2px #597e8d;"
                                                            data-bs-toggle="popover" data-bs-placement="top"
                                                            data-bs-html="true"
                                                            data-bs-content="<p class='mb-0'>{{ $usuario->name }} - Participante</p><p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>">
                                                            <span id="user_{{ $usuario->id }}"
                                                                class="badge bg-red"></span></span>
                                                    @else
                                                        <span class="avatar avatar-xs avatar-rounded cursor-help"
                                                            data-bs-toggle="popover" data-bs-placement="top"
                                                            data-bs-html="true"
                                                            data-bs-content="<p class='mb-0'>{{ $usuario->name }} - Participante</p>
                                                        <p class='mb-0'><a href='#'>{{ $usuario->email }}</a></p>
                                                        ">{{ Str::substr($usuario->name, 0, 2) }}<span
                                                                id="user_{{ $usuario->id }}"
                                                                class="badge bg-red"></span></span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <h6>Estas solit@</h6>
                                    @endif
                                </div>
                            </div>

                            <div class="col-auto mx-0 px-1 pt-2">
                                <a href="{{ route('diagramas.index', $diagrama->proyecto_id) }}"
                                    class="btn btn-secondary">
                                    Volver
                                </a>
                            </div>

                            @if ($diagrama->proyecto->user_id == Auth::user()->id)
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="{{ route('diagramas.descargar', $diagrama->id) }}" class="btn btn-primary"
                                        title="Guardar copia de seguridad">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Guardar
                                    </a>
                                </div>
                                {{-- <div class="col-auto mx-0 px-1 pt-2">
                                    <form action="{{ route('architect') }}" method="POST">
                                        @csrf
                                        <input type="text" name="diagrama_id" hidden value="{{ $diagrama->id }}">
                                        <button class="btn btn-blue" type="submit" title="Exportar para architect">
                                            <img src="{{ asset('/assets/img/enterprise-architect-logo.png') }}"
                                                width="75">
                                        </button>
                                    </form>
                                </div>
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="#" class="btn btn-orange d-none d-sm-inline-block"
                                        data-bs-toggle="modal" data-bs-target="#modal-report">
                                        Importar
                                    </a>
                                </div> --}}
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="{{ route('script.mysql', $diagrama->id) }}" class="btn btn-white"
                                        type="submit" title="Script mysql">
                                        <img src="https://th.bing.com/th/id/OIP.Ppjp4ggi4QqjaD5-i4jkfwHaHa?pid=ImgDet&rs=1"
                                            width="20">
                                    </a>
                                </div>
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="{{ route('script.sqlserver', $diagrama->id) }}" class="btn btn-white"
                                        type="submit" title="Script sqlite">
                                        <img src="https://www.freeiconspng.com/thumbs/sql-server-icon-png/sql-server-icon-png-1.png"
                                            width="20">
                                    </a>
                                </div>
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="{{ route('script.pgsql', $diagrama->id) }}" class="btn btn-white"
                                        type="submit" title="Script postgresql">
                                        <img src="https://i.pinimg.com/originals/06/86/c0/0686c0c85407548ea5bd737a572974b6.png"
                                            width="23">
                                    </a>
                                </div>
                                <div class="col-auto mx-0 px-1 pt-2">
                                    <a href="{{ route('viewhtml', $diagrama->id) }}" class="btn btn-white"
                                        type="submit" title="Vistas">
                                        <img src="https://icon-library.com/images/html-icon-png/html-icon-png-4.jpg"
                                            width="23">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <div class="app-header">
            <div class="app-title" style="background-color: rgb(235, 235, 235)">
                <img src="{{ asset('assets/img/logo.png') }}" height="70px" alt="">
            </div>
            <div class="toolbar-container"></div>
        </div>
        <div class="app-body">
            <div class="stencil-container"></div>
            <div class="paper-container"></div>
            <div class="inspector-container" style="background-color: rgba(23,67,122,255)"></div>
            <div class="navigator-container"></div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Importar desde Architect</h5><img
                        src="{{ asset('/assets/img/enterprise-architect-logo.png') }}" width="75">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('exportar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Archivo</label>
                                        <input name="url" type="file" accept=".xml" class="form-control">
                                    </div>
                                    <input type="integer" hidden value="{{ $diagrama->id }}" name="diagrama_id">
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
                            Exportar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <textarea id="contenido" hidden cols="30" rows="10">{{ $diagrama->contenido }}</textarea>
    <input name="diagrama_id" type="text" value="{{ $diagrama->id }}" hidden>
    <input name="permiso" type="text" value="{{ $permiso }}" hidden>

    <input name="persona" type="text" value="{{ asset('assets/image-person.svg') }}" hidden>
    <input name="persona2" type="text" value="{{ asset('assets/image-person-2.svg') }}" hidden>
    <input name="cylinder_horizontal" type="text" value="{{ asset('assets/image-cylinder-horizontal.svg') }}"
        hidden>
    <input name="data_container" type="text" value="{{ asset('assets/image-data-container.svg') }}" hidden>
    <input name="hexagon" type="text" value="{{ asset('assets/image-hexagon.svg') }}" hidden>
    <input name="web_browser" type="text" value="{{ asset('assets/image-web-browser.svg') }}" hidden>
    <input name="transparent_icon" type="text" value="{{ asset('assets/transparent-icon.svg') }}" hidden>
    <input name="no_color_icon" type="text" value="{{ asset('assets/no-color-icon.svg') }}" hidden>
    <input name="auth_id" type="text" value="{{ Auth::user()->id }}" hidden>
    @push('scripts')
        <script>
            var diagrama_id = $("input[name=diagrama_id]").val();
            var contenido = document.getElementById("contenido").value;
            var permiso = $("input[name=permiso]").val()
            var person = $("input[name=persona]").val();
            var person2 = $("input[name=persona2]").val();
            var cylinder_horizontal = $("input[name=cylinder_horizontal]").val();
            var data_container = $("input[name=data_container]").val();
            var hexagon = $("input[name=hexagon]").val();
            var web_browser = $("input[name=web_browser]").val();
            var transparent_icon = $("input[name=transparent_icon]").val();
            var no_color_icon = $("input[name=no_color_icon]").val();

            var auth_id = $("input[name=auth_id]").val();
            // console.log(contenido)

            // console.log(window.location.pathname.substr(11));

            function guardar(paper) {
                axios.post("/diagramas/guardar", {
                        id: diagrama_id,
                        contenido: paper
                    })
                    .then((res) => {
                        /* console.log(res.data) */
                    })
                    .catch((error) => {
                        console.log(error);
                        Swal.fire(`Ocurrió un problema, por favor inténtalo más tarde.`)
                    });
            };
        </script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/lodash.js') }}"></script>
        <script src="{{ asset('js/backbone.js') }}"></script>
        <script src="{{ asset('js/graphlib.core.js') }}"></script>
        <script src="{{ asset('js/dagre.core.js') }}"></script>
        <script src="{{ asset('js/rappid.js') }}"></script>

        <script src="{{ asset('js/config/halo.js') }}"></script>
        <script src="{{ asset('js/config/selection.js') }}"></script>
        <script src="{{ asset('js/config/inspector.js') }}"></script>
        <script src="{{ asset('js/config/stencil.js') }}"></script>
        <script src="{{ asset('js/config/toolbar.js') }}"></script>
        <script src="{{ asset('js/config/sample-graphs.js') }}"></script>
        <script src="{{ asset('js/views/main.js') }}"></script>
        <script src="{{ asset('js/views/theme-picker.js') }}"></script>
        <script src="{{ asset('js/models/joint.shapes.app.js') }}"></script>
        <script src="{{ asset('js/views/navigator.js') }}"></script>
        <script>
            joint.setTheme('modern');
            app = new App.MainView({
                el: '#app'
            });
            themePicker = new App.ThemePicker({
                mainView: app
            });
            themePicker.render().$el.appendTo(document.body);
            window.addEventListener('load', function() {
                /* console.log(contenido.length) */
                if (contenido.length > 3) {
                    app.graph.fromJSON(JSON.parse(contenido));
                }
            });

            Echo.join(`diagramar.${diagrama_id}`).listen('DiagramaSent', (e) => {
                    app.graph.fromJSON(JSON.parse(e.diagrama.contenido));
                })
                .here(users => {
                    for (let index = 0; index < users.length; index++) {
                        if (users[index].id != auth_id) {
                            let id = `user_${users[index].id}`;
                            let claseU = document.getElementById(`${id}`);
                            claseU.className = 'badge bg-green';
                        }
                    }
                })
                .joining(user => {

                    let id = `user_${user.id}`;
                    let claseU = document.getElementById(id);
                    claseU.className = 'badge bg-green';

                })
                .leaving(user => {
                    let id = `user_${user.id}`;
                    let claseU = document.getElementById(id);
                    claseU.className = 'badge bg-red';
                });
        </script>

        <!-- Local file warning: -->
        <div id="message-fs" style="display: none;">
            <p>The application was open locally using the file protocol. It is recommended to access it trough a <b>Web
                    server</b>.</p>
            <p>Please see <a href="README.md">instructions</a>.</p>
        </div>
        <script>
            (function() {
                var fs = (document.location.protocol === 'file:');
                var ff = (navigator.userAgent.toLowerCase().indexOf('firefox') !== -1);
                if (fs && !ff) {
                    (new joint.ui.Dialog({
                        width: 300,
                        type: 'alert',
                        title: 'Local File',
                        content: $('#message-fs').show()
                    })).open();
                }
            })();
        </script>
    @endpush
</x-app-layout>
