@extends('layouts.app')

@section('content')
    <div style="margin: 0 auto;  width: 50%;" class="search-container">
        <div style="margin-left: -5.5em;">
            <form method="post" action="{{action('SocisController@mostra')}}">
                @csrf
                <div class="form-group row" style="margin-bottom: 20px">
                    <label for="Nif"
                           class="col-md-4 col-form-label text-md-right">{{ __('Nif') }}</label>
                    <div class="col-md-6 btn-group ">
                        <input type="text" placeholder="Dni Soci..." name="nif" required>
                        <button style="margin-left: 15px" type="submit" class="btn btn-primary">Cerca</button>

                    </div>
                </div>
            </form>

            <form id="selOng" method="post" action="{{route('socis.mostraPerOng')}}">
                @csrf
                <div class="form-group row" style="margin-bottom: 20px">
                    <label for="ong"
                           class="col-md-4 col-form-label text-md-right">{{ __('Ong') }}</label>
                    <div class="col-md-6">
                        <select id="selectOng" required name="ongSocis" class="form-select"
                                aria-label="Default select example">
                            <option></option>
                            @foreach($ong as $row)
                                <option value="{{$row['id']}}">{{$row['nomAssociacio']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $("#selectOng").change(function () {
                            $('#selOng').submit();
                        })
                    });
                </script>
            </form>
        </div>
    </div>

    @if(isset($socisOng))

        <div class="col-md-4" style="text-align: center; margin: 0 auto">
            <div id="card2" class="card">
                <div class="card-header">{{ $ongName }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Cif</th>
                            <th>Nom</th>
                            <th></th>
                        </tr>


                        @foreach($socisOng as $row)
                            <tr>
                                <td>{{$row->nifSoci}}</td>
                                <td>{{$row->nomSoci}}</td>
                                <td>
                                    <div style="display:inline-block">

                                        <form method="post" action="{{action('SocisController@mostra')}}">
                                            @csrf
                                            <input type="hidden" name="nif" value="{{$row->nifSoci}}">
                                            <button type="submit" class="btn btn-primary">Edita</button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection


