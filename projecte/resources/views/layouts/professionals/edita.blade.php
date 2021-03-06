@extends('layouts.app')

@section('content')
    @if($ong)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edita Professional') }}</div>
                        <div class="card-body">
                            <form method="post" action="{{action('ProfessionalController@update',$id)}}">

                                {{csrf_field()}}

                                <input type="hidden" name="_method" value="PATCH"/>

                                <div class="form-group row" style="margin-bottom: 20px">
                                    <label for="ong"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Ong') }}</label>
                                    <div class="col-md-6">
                                        <select required name="ong" class="form-select"
                                                aria-label="Default select example">
                                            <option></option>
                                            @foreach($ong as $row)
                                                @if($row['id']==$professional->associacio_id)
                                                    <option value="{{$row['id']}}" selected>{{$row['nomAssociacio']}}</option>
                                                @else
                                                    <option value="{{$row['id']}}">{{$row['nomAssociacio']}}</option>
                                                @endif
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
                                                    class="form-control @error('nif') is-invalid @enderror" name="nif"
                                                    value="{{$professional->nifTreballador}}" required autofocus>

                                                @error('nif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nom"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                            <div class="col-md-6">
                                                <input id="nom" type="text"
                                                    class="form-control @error('email') is-invalid @enderror" name="nom"
                                                    value="{{$professional->nomTreballador}}" required>

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
                                                    class="form-control @error('cognoms') is-invalid @enderror" name="cognoms"
                                                    value="{{$professional->cognomsTreballador}}" required>

                                                @error('cognoms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="adressa" class="col-md-4 col-form-label text-md-right">{{ __('Adre??a') }}</label>
                                            <div class="col-md-6">
                                                <input id="adressa" type="text" class="form-control @error('adressa') is-invalid @enderror"
                                                    name="adressa" value="{{$professional->adrecaTreballador}}" required>

                                                @error('adressa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="poblacio"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Poblacio') }}</label>
                                            <div class="col-md-6">
                                                <input id="poblacio" type="text"
                                                    class="form-control @error('poblacio') is-invalid @enderror" name="poblacio"
                                                    value="{{$professional->poblacioTreballador}}" required>
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
                                                    value="{{$professional->comarcaTreballador}}" required>
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
                                            <label for="fixe"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Tel??fon') }}</label>
                                            <div class="col-md-8">
                                                <input placeholder="937654795" pattern="[0-9]{9}" id="fixe" type="text" name="fixe"
                                                        class="form-control @error('fixe') is-invalid @enderror" name="fixe"
                                                        value="{{$professional->fixeTreballador}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mobil"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('M??bil') }}</label>
                                            <div class="col-md-8">
                                                <input placeholder="637654795" pattern="[0-9]{9}" id="mobil" type="text" name="mobil" 
                                                        class="form-control editProfessional"
                                                        value="{{$professional->mobilTreballador}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="correu"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Correu') }}</label>
                                            <div class="col-md-8">
                                                <input id="correu" type="email" name="correu"
                                                        class="form-control editProfessional"
                                                        value="{{$professional->correuTreballador}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dataIngres"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Data ingr??s') }}</label>
                                            <div class="col-md-8">
                                                <input id="dataIngres" type="date" name="dataIngres"
                                                        class="form-control editTreballador"
                                                        value="{{$professional->dataIngresTreballador}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="carrec"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('C??rrec') }}</label>
                                            <div class="col-md-8">
                                                <input id="carrec" type="text" name="carrec"
                                                        class="form-control editProfessional"
                                                        value="{{$professional->carrec}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="seguretatSocial"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Paga SS') }}</label>
                                            <div class="col-md-8">
                                                <input pattern="[0-9]+" id="seguretatSocial" type="text" name="seguretatSocial"
                                                        class="form-control editProfessional"
                                                        value="{{$professional->seguretatSocial}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="percentatgeIRPF"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('% IRPF') }}</label>
                                            <div class="col-md-8">
                                                <input pattern="([0-9]|[0-9][0-9]|100)" minlength="1" maxlength="3" id="percentatgeIRPF" type="text" name="percentatgeIRPF"
                                                        class="form-control editProfessional"
                                                        value="{{$professional->percentatgeIRPF}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Envia') }}
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
        <h3>No es poden editar els professionals perque no n'existeix cap ONG a la base de dades</h3>
    @endif
@endsection


