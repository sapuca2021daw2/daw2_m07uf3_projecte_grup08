@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nova Ong') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('ong.store')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="cif" class="col-md-4 col-form-label text-md-right">{{ __('Cif') }}</label>
                                <div class="col-md-6">
                                    <input placeholder="86957432B" pattern="[0-9]{8}[A-Z]" id="cif" type="text" class="form-control @error('cif') is-invalid @enderror"
                                           name="cif" value="{{ old('cif') }}" required autofocus autocomplete="cif">
                                    @error('cif')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                           name="nom" value="{{ old('nom') }}" required autocomplete="nom">
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adressa"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Adreça') }}</label>
                                <div class="col-md-6">
                                    <input id="adressa" type="text"
                                           class="form-control @error('adressa') is-invalid @enderror" name="adressa"
                                           required autocomplete="adressa">
                                    @error('adressa')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="poblacio"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Població') }}</label>
                                <div class="col-md-6">
                                    <input id="poblacio" type="text"
                                           class="form-control @error('poblacio') is-invalid @enderror" name="poblacio"
                                           value="{{ old('poblacio') }}" required autocomplete="poblacio" autofocus>
                                    @error('poblacio')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="comarca"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Comarca') }}</label>
                                <div class="col-md-6">
                                    <input id="comarca" type="text"
                                           class="form-control @error('comarca') is-invalid @enderror" name="comarca"
                                           value="{{ old('comarca') }}" required autocomplete="comarca" autofocus>
                                    @error('comarca')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipus"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Tipus') }}</label>
                                <div class="col-md-6">
                                    <input id="tipus" type="text"
                                           class="form-control @error('tipus') is-invalid @enderror" name="tipus"
                                           value="{{ old('tipus') }}" required autocomplete="tipus" autofocus>
                                    @error('tipus')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="utilitat"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Utilitat') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input name="utilitat" class="form-check-input" type="checkbox">
                                        <label>És d'utilitat pública?</label>
                                    </div>
                                    @error('utilitat')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registra') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <label>{{ $error }}</label>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
