@section('title', 'Editar Proyecto')
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
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <span class="d-none d-sm-inline">
                                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">
                                    Volver
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-xl">
                        <div class="row row-cards">
                            <div class="col-lg-5">

                                <div class="containerdd">
                                    <h3>Subir Imagen</h3>
                                    <div class="drag-area">
                                        <img src="{{ asset('storage/' . $proyecto->url) }}" alt=""
                                            id="perfil">
                                    </div>
                                    <input type="file" id="img" name="url" class="form-control"
                                        onchange="verImagen(event)" accept=".jpge,.jpg,.png">
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <div class="form-label text-primary">Nombre del Evento</div>
                                                <input name="nombre" type="text"
                                                    class="form-control {{-- @error('name')is-invalid @enderror --}}"
                                                    value="{{ $proyecto->nombre }}" required>
                                                {{-- @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror --}}
                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-3">
                                                    <div class="col-md-8">
                                                        <div class="form-label text-primary">Ubicacion</div>
                                                        <input name="descripcion" type="text"
                                                            class="form-control {{-- @error('name')is-invalid @enderror --}}"
                                                            value="{{ $proyecto->descripcion }}" required>
                                                        {{--                                             @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="form-label text-primary">Fecha de realizacion</div>
                                                        <div class="input-icon mb-2">
                                                            <input type="datetime-local" class="form-control"
                                                                placeholder="Select a date" id="datepicker-icon"
                                                                name="fecha_fin" value="{{ $proyecto->fecha_fin }}" />
                                                            <span class="input-icon-addon">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <rect x="4" y="5" width="16"
                                                                        height="16" rx="2" />
                                                                    <line x1="16" y1="3" x2="16"
                                                                        y2="7" />
                                                                    <line x1="8" y1="3" x2="8"
                                                                        y2="7" />
                                                                    <line x1="4" y1="11" x2="20"
                                                                        y2="11" />
                                                                    <line x1="11" y1="15" x2="12"
                                                                        y2="15" />
                                                                    <line x1="12" y1="15" x2="12"
                                                                        y2="18" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        {{-- @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror --}}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent mt-auto">
                                        <div class="btn-list justify-content-begin">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const svgp = document.getElementById('svg');
            const svg = svgp.childNodes[3];
            console.log(svg);
            const {
                x,
                y,
                width,
                height
            } = svg.viewBox.baseVal;
            const blob = new Blob([svg.outerHTML], {
                type: 'image/svg+xml'
            });
            const url = URL.createObjectURL(blob);
            const image = document.createElement('img');
            image.src = url;
            image.addEventListener('load', () => {
                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;
                const context = canvas.getContext('2d');
                context.drawImage(image, x, y, width, height);
                let link = document.getElementById('descargar');
                link.href = canvas.toDataURL();
                URL.revokeObjectURL(url);
            })
        </script>
        <script>
            let verImagen = (event) => {
                let leer_img = new FileReader();
                let id_img = document.getElementById('perfil');

                leer_img.onload = () => {
                    if (leer_img.readyState == 2) {
                        id_img.src = leer_img.result;
                    }
                }
                leer_img.readAsDataURL(event.target.files[0])
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.Litepicker && (new Litepicker({
                    element: document.getElementById('datepicker-icon'),
                    buttonText: {
                        previousMonth: `
            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="15 6 9 12 15 18" />
            </svg>`,
                        nextMonth: `
            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="9 6 15 12 9 18" />
            </svg>`,
                    },
                }));
            });
        </script>
    @endpush
</x-app-layout>
