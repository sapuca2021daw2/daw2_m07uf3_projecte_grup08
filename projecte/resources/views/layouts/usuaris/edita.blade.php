@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edita Usuari') }}</div>
                    <div class="card-body">
                        @if (session('resposta'))
                            <div id="successMessage" class="alert alert-success" role="alert">
                                {{ session('resposta') }}
                            </div>
                        @endif
                        <script>
                            setTimeout(function() {
                                $('#successMessage').fadeOut('fast');
                            }, 3000);
                        </script>
                        <form method="post" action="{{action('UsuariController@update',$id)}}">

                            {{csrf_field()}}

                            <input type="hidden" name="_method" value="PATCH"/>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nom usuari') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="nomUsuari"
                                           value="{{$usuari->name}}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Correu') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="exemple@gmail.com"
                                           class="form-control @error('email') is-invalid @enderror" name="correu"
                                           value="{{$usuari->email}}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                           name="nom" value="{{$usuari->nom}}" required>

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Cognoms') }}</label>

                                <div class="col-md-6">
                                    <input id="cognoms" type="text"
                                           class="form-control @error('cognoms') is-invalid @enderror" name="cognoms"
                                           value="{{$usuari->cognoms}}" required>

                                    @error('cognoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobil"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mòbil') }}</label>

                                <div class="col-md-6">
                                    <input pattern="[0-9]{9}" id="mobil" type="text" placeholder="678678678"
                                           class="form-control @error('mobil') is-invalid @enderror" name="mobil"
                                           value="{{$usuari->mobil}}" required>

                                    @error('mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @if (Auth::user()->esAdmin())
                                <div class="form-group row">
                                    <label for="esAdmin"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input name="rol" class="form-check-input" type="checkbox" {{$usuari->rol==1 ? 'checked' : null}} >
                                            <label >L'usuari és administrador?</label>
                                        </div>
                                        @error('rol')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Envia') }}
                                    </button>
                                @if (Auth::user()->name==$usuari->name)
                                        <a href="{{route('reset',$usuari->id)}}">
                                            <button type="button" class="btn btn-dark">Canvia la contrasenya</button>
                                        </a>
                                @endif
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


