@extends('layouts.app')


@section('content')
    @if($ong)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="card" class="card">
                        <div class="card-header">{{ __('Nou Soci') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('socis.store') }}">
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
                                            <label for="nif"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Nif') }}</label>
                                            <div class="col-md-6">
                                                <input placeholder="68957354D" pattern="[0-9]{8}[A-Z]{1}" id="nif" type="text"
                                                       class="form-control"
                                                       name="nif"
                                                       value="{{ old('nif') }}" required autocomplete="nif" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nom"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                            <div class="col-md-6">
                                                <input id="nom" type="text"
                                                       class="form-control"
                                                       name="nom"
                                                       value="{{ old('nom') }}" required autocomplete="nom">
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
                                                <input id="adressa" type="text" class="form-control"
                                                       name="adressa" required
                                                       autocomplete="adressa">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="poblacio"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Població') }}</label>
                                            <div class="col-md-6">
                                                <input id="poblacio" type="text"
                                                       class="form-control "
                                                       name="poblacio"
                                                       value="{{ old('poblacio') }}" required autocomplete="poblacio"
                                                       autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="comarca"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Comarca') }}</label>
                                            <div class="col-md-6">
                                                <input id="comarca" type="text"
                                                       class="form-control"
                                                       name="comarca" value="{{ old('comarca') }}" required
                                                       autocomplete="comarca" autofocus>
                                            </div>
                                        </div>

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
                                            <label for="quota"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Quata Mensual') }}</label>
                                            <div class="col-md-6">
                                                <input placeholder="561.25" step="0.01" min="0" max="999.99" id="quota" type="number"
                                                       class="form-control"
                                                       name="quota"
                                                       value="{{ old('quota') }}" required autocomplete="quota"
                                                       autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary "
                                                style="float:right; margin-top: 20px">
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
    @else
        <h3>No es poden donar d'alta nous socis perquè no existeix cap ONG a la base de dades</h3>
    @endif
@endsection
