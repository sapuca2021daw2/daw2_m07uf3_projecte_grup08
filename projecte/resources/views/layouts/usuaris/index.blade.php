@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Usuari</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Correu</th>
            <th>Mòbil</th>
            <th>Rol</th>
            <th>Accions</th>
        </tr>
    @foreach($usuaris as $row)
        <tr>
            <td>{{$row['name']}}</td>
            <td>{{$row['nom']}}</td>
            <td>{{$row['cognoms']}}</td>
            <td>{{$row['email']}}</td>
            <td>{{$row['mobil']}}</td>
            <td>{{$row['rol']==1 ? 'Admin' : 'Usuari'}}</td>
            <td>
                <div style="display:inline-block">
                <a href="{{ url('/usuaris/'.$row['id'].'/edit') }}"><button class="btn btn-primary">Edita</button></a>
                    @if((Auth::user()->name)!=$row['name'])
                <form class="delete_form" style="float: right; margin-left: 10px" method="post" action="{{url('usuaris/'.$row['id'])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-danger" type="submit" value="Elimina">
                </form>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <script>
        $(function () {
            $('.delete_form').on('submit', function () {
                if (confirm("S'esborrarà aquest usuari, vols continuar?")) {
                    return true;
                } else {
                    return false;
                }

            });
        });
    </script>
    <a href="{{ route('register') }}"><button class="btn btn-primary">Nou Usuari</button>

@endsection


