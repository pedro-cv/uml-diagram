@section('title', 'Perfil')
<x-app-layout>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Configuraciones
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('proyectos.index') }}" class="btn btn-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-2"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="4" y="4" width="6" height="5" rx="2" />
                                    <rect x="4" y="13" width="6" height="7" rx="2" />
                                    <rect x="14" y="4" width="6" height="7" rx="2" />
                                    <rect x="14" y="15" width="6" height="5" rx="2" />
                                </svg>
                                Proyectos
                            </a>
                            
                            <a href="{{ route('dashboard') }}" class="btn btn-success" title="Inicio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home m-0"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                                Home
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-3 d-none d-md-block border-end bg-primary-lt">

                            <div class="card-body">
                                <h4 class="subheader">Configuraciones de Cuenta</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="{{ route('profile.index') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center active">Mi
                                        Cuenta</a>
                                    <a href="{{ route('notificaciones.index') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center">Mis
                                        Notificaciones</a>
                                </div>
                                <h4 class="subheader mt-4">Contratos</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="#" class="list-group-item list-group-item-action">Planes</a>
                                </div>
                            </div>

                        </div>

                        <div class="col d-flex flex-column">
                            <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <h2 class="mb-3">Mi Cuenta</h2>
                                    <h3 class="card-title">Detalles de Perfil</h3>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="form-label text-primary">Cambiar Foto de Perfil</div>
                                                <input type="file" name="url" class="form-control"
                                                    onchange="verImagen(event)" accept=".svg,.jpge,.jpg,.png" />
                                                <img class="avatar avatar-xl mt-3 mb-1"
                                                    src="{{ $user->url ? asset('storage/' . $user->url) : './back/static/avatars/000.png' }}"
                                                    id="perfil">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-label text-primary">Cambiar Nombre</div>
                                            <input name="name" type="text"
                                                class="form-control @error('name')is-invalid @enderror"
                                                value="{{ $user->name }}">
                                            @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="form-label text-primary">Cambiar Email</div>
                                                <input name="email" type="text"
                                                    class="form-control @error('email')is-invalid @enderror"
                                                    value="{{ $user->email }}">
                                                @error('name')
                                                    <small class="invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-label text-primary">Cambiar contraseña</div>
                                                <div class="form-floating mb-1">
                                                    <input name="password_actual" type="password"
                                                        class="form-control" id="floating-password-0"
                                                        autocomplete="off">
                                                    <label for="floating-password">Contraseña actual</label>
                                                </div>
                                                @error('passwordActual')
                                                    <small class="text-danger mb-2">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-1">
                                                    <input name="password_new" type="password"
                                                        class="form-control @error('password_new')is-invalid @enderror"
                                                        id="floating-password-1" autocomplete="off">
                                                    <label for="floating-password">Nueva Contraseña</label>
                                                </div>
                                                @error('passwordMenor')
                                                    <small class="text-danger mb-2">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-1">
                                                    <input name="password_confirm" type="password"
                                                        class="form-control @error('password_confirm')is-invalid @enderror"
                                                        id="floating-password-2" autocomplete="off">
                                                    <label for="floating-password">Confirmar Nueva Contraseña</label>
                                                </div>
                                                @error('passwordConfirm')
                                                    <small class="text-danger mb-2">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent mt-auto">
                                    <div class="btn-list justify-content-start">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
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
    @endpush
</x-app-layout>
