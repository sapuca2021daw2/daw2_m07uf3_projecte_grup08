@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restableix contrasenya') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuaris.password.update') }}">
                        @csrf


                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group row">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Contrasenya actual') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" required autocomplete="old_password" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nova Contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma Contrassenya') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" class="form-control" name="password_confirmation" required autocomplete="confirm-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-primary">
                            <h3>Utilitza una contrasenya segura, ha de contenir:</h3>
                            <ul>
                                <li>Miním 8 caracters.</li>
                                <li>Una majúscula.</li>
                                <li>Un nombre.</li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
