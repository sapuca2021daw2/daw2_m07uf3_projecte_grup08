@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Cif</th>
            <th>Nom</th>
            <th>Adreça</th>
            <th>Població</th>
            <th>Comarca</th>
            <th>Tipus</th>
            <th>Utilitat</th>
            <th></th>
        </tr>
        @foreach($ong as $row)
            <tr>
                <td>{{$row->cif}}</td>
                <td>{{$row->nomAssociacio}}</td>
                <td>{{$row->adrecaAssociacio}}</td>
                <td>{{$row->poblacioAssociacio}}</td>
                <td>{{$row->comarcaAssociacio}}</td>
                <td>{{$row->tipus}}</td>
                <td>{{$row->esDeclarada==1 ? 'Pública' : 'Privada'}}</td>
                <td>
                    <div style="display:inline-block">
                        <a href="{{ url('/ong/'.$row->id.'/edit') }}">
                            <button class="btn btn-primary">Edita</button>
                        </a>
                        <form class="delete_form" style="float: right; margin-left: 10px" method="post"
                              action="{{url('ong/'.$row->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="btn btn-danger" type="submit" value="Elimina">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        $(function () {
            $('.delete_form').on('submit', function () {
                if (confirm("S'esborrarà aquesta associació, vols continuar?")) {
                    return true;
                } else {
                    return false;
                }

            });
        });
    </script>

    <a href="{{ url('/ong/create') }}">
        <button class="btn btn-primary">Nova ONG</button>

@endsection


