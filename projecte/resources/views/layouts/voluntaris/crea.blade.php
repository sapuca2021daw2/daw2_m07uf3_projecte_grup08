@extends('layouts.app')

@section('content')
    @if($ong)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Nou Voluntari') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('voluntari.store')}}">
                                @csrf
                                <div class="form-group row" style="margin-bottom: 20px">
                                    <label for="ong"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Ong') }}</label>
                                    <div class="col-md-6">
                                        <select required name="ong" class="form-select"
                                                aria-label="Default select example">
                                            <option></option>
                                            @foreach($ong as $row)
                                                <option value="{{$row['id']}}">{{$row['nomAssociacio']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="nif" class="col-md-4 col-form-label text-md-right">{{ __('Nif') }}</label>
                                            <div class="col-md-6">
                                                <input placeholder="68957354D" pattern="[0-9]{8}[A-Z]{1}" id="nif" type="text" class="form-control @error('nif') is-invalid @enderror"
                                                    name="nif" value="{{ old('nif') }}" required autofocus autocomplete="nif">
                                                @error('nif')
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
                                            <label for="cognoms"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognoms') }}</label>
                                            <div class="col-md-6">
                                                <input id="cognoms" type="text"
                                                        class="form-control "
                                                        name="cognoms" required autocomplete="cognoms">
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
                                    </div>

                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="telefon"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Telèfon') }}</label>
                                            <div class="col-md-6">
                                                <input placeholder="937654795" pattern="[0-9]{9}" id="telefon" type="text"
                                                        class="form-control"
                                                        name="telefon"
                                                        value="{{ old('telefon') }}" required autocomplete="telefon"
                                                        autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mobil"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Mòbil') }}</label>
                                            <div class="col-md-6">
                                                <input placeholder="637654795" pattern="[0-9]{9}" id="mobil" type="text"
                                                        class="form-control"
                                                        name="mobil"
                                                        value="{{ old('mobil') }}" required autocomplete="mobil"
                                                        autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="correu"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Correu') }}</label>
                                            <div class="col-md-6">
                                                <input id="correu" type="email"
                                                        class="form-control"
                                                        name="correu"
                                                        value="{{ old('correu') }}" required autocomplete="correu"
                                                        autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="edat"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Edat') }}</label>
                                            <div class="col-md-6">
                                                <input pattern="[0-9]+" id="edat" type="text"
                                                        class="form-control"
                                                        name="edat"
                                                        value="{{ old('edat') }}" required autocomplete="edat"
                                                        autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="professio"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Professió') }}</label>
                                            <div class="col-md-6">
                                                <input id="professio" type="text"
                                                        class="form-control"
                                                        name="professio"
                                                        value="{{ old('professio') }}" required autocomplete="professio"
                                                        autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="horesDedicades"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Hores dedicades') }}</label>
                                            <div class="col-md-6">
                                                <input pattern="[0-9]+" id="horesDedicades" type="text"
                                                        class="form-control"
                                                        name="horesDedicades"
                                                        value="{{ old('horesDedicades') }}" required autocomplete="horesDedicades"
                                                        autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registra') }}
                                            </button>
                                        </div>
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
    @else
        <h3>No es poden donar d'alta nous voluntaris perquè no existeix cap ONG a la base de dades</h3>
    @endif
@endsection
