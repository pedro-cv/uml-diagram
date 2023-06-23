<x-guest-layout>
    @section('title', isset($title) ? $title : 'Login')

    <div class="page page-center bg-dark">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('assets/img/logo.png')}}"
                        height="50" alt=""></a>
            </div>
            <form method="POST" action="{{ route('login') }}" class="card card-md" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Iniciar sesion con tu Cuenta</h2>
                    <div class="mb-3">
                        {{-- Email --}}
                        <label class="form-label">Dirección Email</label>
                        <input id="email" name="email" type="email" class="form-control"
                            placeholder="Ingresa tu Email" autocomplete="off" :value="old('email')">
                    </div>
                    <div class="mb-2">
                        {{-- Password --}}
                        <label class="form-label">
                            Contraseña
                        </label>

                        <div class="input-group input-group-flat">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Contraseña" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input id="remember_me" name="remember" type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Recuerdame en este dispositivo</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </div>
                </div>
                {{-- <div class="hr-text">or</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="#" class="btn btn-white w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                            </svg>
                            Login with Github
                        </a></div>
                    <div class="col"><a href="#" class="btn btn-white w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                            </svg>
                            Login with Twitter
                        </a></div>
                </div>
            </div> --}}
            </form>
            <div class="text-center text-muted mt-3">
                Aun no tienes una cuenta? <a href="./sign-up.html" tabindex="-1">Sign up</a>
                @if (Route::has('password.request'))
                    <br><br>
                    <a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                @endif
            </div>
        </div>
    </div>

</x-guest-layout>
