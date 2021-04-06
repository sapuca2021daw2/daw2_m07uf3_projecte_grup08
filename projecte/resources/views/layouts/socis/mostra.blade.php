@extends('layouts.app')

@section('content')

    @if($soci)
            <div class="card text-center">
                <div class="card-body">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-20">
                                <div id="card" class="card">
                                    @if (isset($ask))
                                        <div id="successMessage" class="alert alert-warning" role="alert">
                                            Aquesta persona ja és sòcia d'aquesta associació
                                        </div>
                                    @endif
                                    <script>
                                        setTimeout(function() {
                                            $('#successMessage').fadeOut('fast');
                                        }, 3000);
                                    </script>
                                    <div class="card-header headerTitle">{{ __('Dades Soci') }}</div>
                                    <div id="cardDadesSoci" class="card-body ">
                                        <form id="formEditSoci" action="{{route('socis.update',$soci->id)}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT"/>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <label for="nif"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Nif') }}</label>
                                                        <div class="col-md-8">
                                                            <input placeholder="68957354D" pattern="[0-9]{8}[A-Z]{1}" id="nif" type="text" name="nifSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->nifSoci}}" disabled autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label for="nom"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="nom" type="text" name="nomSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->nomSoci}}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="cognoms"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Cognoms') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="cognoms" type="text" name="cognomsSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->cognomsSoci}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="adressa"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Adreça') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="adressa" type="text" name="adrecaSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->adrecaSoci}}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="poblacio"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Població') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="poblacio" type="text" name="poblacioSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->poblacioSoci}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group row">
                                                        <label for="comarca"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Comarca') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="comarca" type="text" name="comarcaSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->comarcaSoci}}"
                                                                   disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="telefon"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Telèfon') }}</label>
                                                        <div class="col-md-8">
                                                            <input placeholder="937654795" pattern="[0-9]{9}" id="telefon" type="text" name="fixeSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->fixeSoci}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mobil"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Mòbil') }}</label>
                                                        <div class="col-md-8">
                                                            <input placeholder="637654795" pattern="[0-9]{9}" id="mobil" type="text" name="mobilSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->mobilSoci}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="correu"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Correu') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="correu" type="email" name="correuSoci"
                                                                   class="form-control editSoci"
                                                                   value="{{$soci->correuSoci}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="editaSoci"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Edita Soci') }}</label>
                                                        <div class="col-md-8 btns">
                                                            <button id="btnSoci" type="button"
                                                                    class="btn btn-primary hide">
                                                                Edita
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col ong">

                                        <div id="card2" class="card">
                                            <div class="card-header">{{ __('És soci de...') }}</div>
                                            <div class="card-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>ONG</th>
                                                        <th>Quota M.</th>
                                                        <th>Aportació A.</th>
                                                        <th>Data Alta</th>
                                                        <th></th>
                                                    </tr>

                                                    @foreach($ong as $row)
                                                        <tr>
                                                            <td>{{$row->nomAssociacio}}</td>
                                                            <td>{{$row->quotaMensual}}</td>
                                                            <td>{{$row->aportacioAnual}}</td>
                                                            <td>{{$row->dataAltaSoci}}</td>

                                                            <td>
                                                                <div style="display:inline-block">
                                                                    <form style="float: left"
                                                                          action="{{action('SocisController@aportacio')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <input hidden value="{{$row->soci_id}}"
                                                                               name="idSoci">
                                                                        <input hidden value="{{$row->id}}" name="id">

                                                                        <input type="number" placeholder="561.25" step="0.01" min="0" max="999.99"  style="width: 100px"
                                                                               required name="aportacio">
                                                                        <button type="submit" class="btn btn-primary"
                                                                                style="margin-left: 10px">
                                                                            Canvia Aportació
                                                                        </button>
                                                                    </form>
                                                                    <form class="delete_form"
                                                                          style="float: left; margin-left: 10px"
                                                                          method="post"
                                                                          action="{{route('socis.destroy',$row->id)}}">
                                                                        @csrf
                                                                        <input type="hidden" name="_method"
                                                                               value="DELETE"/>
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Baixa
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </table>
                                            </div>
                                        </div>

                                        <div id="card3" class="card" hidden>
                                            <div class="card-header">{{ __('Tria una ONG') }}</div>
                                            <div class="card-body">
                                                <form id="addingOng" method="post" action="{{route('socis.addSociOng')}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="POST"/>

                                                    <input type="hidden" value="{{$soci->id}}"
                                                           name="idSoci">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th>ONG</th>
                                                            <th>Quota mensual</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select required name="ong" class="form-select"
                                                                        aria-label="Default select example">
                                                                    <option></option>
                                                                    @foreach($llistaOng as $row)
                                                                        <option
                                                                            value="{{$row['id']}}">{{$row['nomAssociacio']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div class="form-group row">
                                                                    <label for="quota"
                                                                           class="col-md-4 col-form-label text-md-right">{{ __('Quota Mensual') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="quota" type="number"
                                                                               class="form-control"
                                                                               name="quota" required autofocus>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group ">
                                                        <button id="cancelAddOng" class="btn btn-danger" type="button">
                                                            Desfés
                                                        </button>
                                                        <button id="cancelAddOng" class="btn btn-primary" type="submit">
                                                            Envia
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="form-group ">

                                            <button id="fesSoci" type="button" class="btn btn-primary "
                                                    style="float:right; margin-top: 20px">
                                                {{ __('Fes soci de...') }}
                                            </button>


                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                $('#cancelAddOng').click(function () {
                                                    $('#card2').slideDown();
                                                    $('#card3').attr('hidden', true);
                                                    $('#fesSoci').removeAttr('hidden');
                                                    $('#cardDadesSoci').slideDown();
                                                    $('.headerTitle').text('Dades Soci');
                                                    $('#addingOng').trigger('reset');

                                                })
                                                $("#fesSoci").click(function () {
                                                    $('#card2').slideUp();
                                                    $('#card3').removeAttr('hidden');
                                                    $(this).attr('hidden', true);
                                                    $('#cardDadesSoci').slideUp();
                                                    $('.headerTitle').text('<?php echo $soci->nomSoci . ' ' . $soci->cognomsSoci ?>');
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <h3>No s'ha trobat cap soci amb aquest Nif</h3>
    @endif
    {{--
        <a href="{{ url('/ong/create') }}"><button class="btn btn-primary">Nova ONG</button>--}}

@endsection


