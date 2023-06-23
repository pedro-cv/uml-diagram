@section('title', 'Crear Evento')
<x-app-layout>
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Agregando Evento
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container-xl">
                    <div class="row row-cards">
                        
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <div class="form-label text-primary">Nombre del Evento</div>
                                            <input name="nombre" type="text"
                                                class="form-control {{-- @error('name')is-invalid @enderror --}}" value="" required>
                                            {{-- @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror --}}
                                        </div>
                                        <div class="mt-3">
                                            <div class="row g-3">
                                                <div class="col-md-8">
                                                    <div class="form-label text-primary">Ubicacion</div>
                                                    <input name="descripcion" type="text"
                                                        class="form-control {{-- @error('name')is-invalid @enderror --}}" value=""
                                                        required>
                                                    {{--                                             @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-label text-primary">Fecha de finalizacion</div>
                                                    <div class="input-icon mb-2">
                                                        <input name="fecha_fin" class="form-control" placeholder="Select a date"
                                                            id="datepicker-icon" value="{{ now()->format('d/m/y') }}" />
                                                        <span class="input-icon-addon">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
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
</x-app-layout>