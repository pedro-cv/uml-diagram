<x-guest-layout>
    @section('title', isset($title) ? $title : 'Login')
    <div class="page page-center bg-dark">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/img/logo.png') }}"
                        height="50" alt=""></a>
            </div>
            <form class="card card-md" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Crear nueva cuenta</h2>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name"
                            :value="old('name')">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="Enter email"
                            :value="old('email')">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group input-group-flat">
                            <input id="password" name="password" required type="password" class="form-control"
                                placeholder="Password" autocomplete="new-password">
                        </div>
                    </div>
                    {{-- <input type="number" name="plane_id" value="{{ $plane_id }}" hidden> --}}

                    <div class="mb-3">
                        <label class="form-label">Confirmar Contraseña</label>
                        <div class="input-group input-group-flat">
                            <input id="password_confirmation" name="password_confirmation" required type="password"
                                class="form-control" placeholder="Confirm Password" autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms
                                    and policy</a>.</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100" {{-- data-bs-toggle="modal"
                            data-bs-target="#exampleModalSignUp" title="Rellenar datos de tarjeta" --}}>
                            Registrar
                        </button>
                        <div class="text-center text-muted mt-3">
                            Ya tienes una cuenta? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
                        </div>
                    </div>
                    {{-- <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body rounded">
                                    <div class="card border">
                                        <div class="card-header border">
                                            <h4 class="text-center">Rellena los datos de tu tarjeta Y accede todas las
                                                funcionalidades</h4>
                                        </div>
                                        <div class="card-body pb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Metodo de pago</label>
                                                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                                    <label class="form-selectgroup-item flex-fill">
                                                        <input type="radio" name="form-payment" value="visa"
                                                            class="form-selectgroup-input">
                                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <div class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    class="payment payment-provider-visa payment-xs me-2"></span>
                                                                ending in <strong>7998</strong>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <label class="form-selectgroup-item flex-fill text-white">
                                                        <input type="radio" name="form-payment" value="mastercard"
                                                            class="form-selectgroup-input">
                                                        <div
                                                            class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <div class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    class="payment payment-provider-mastercard payment-xs me-2"></span>
                                                                ending in <strong>2807</strong>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <label class="form-selectgroup-item flex-fill">
                                                        <input type="radio" name="form-payment" value="paypal"
                                                            class="form-selectgroup-input">
                                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <div class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    class="payment payment-provider-paypal payment-xs me-2"></span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <label>Nº de tarjeta</label>
                                            <div class="input-group input-group-outline my-2">
                                                <input type="text" class="form-control"
                                                    placeholder="----/----/----/----">
                                            </div>
                                            <label>MM/AA</label>
                                            <div class="input-group input-group-outline my-2">
                                                <input type="text" class="form-control" placeholder="--/--">
                                            </div>
                                            <label>Codigo de seguridad</label>
                                            <div class="input-group input-group-outline my-2">
                                                <input type="password" class="form-control">
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn bg-success mt-4">Realizar Pago</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>