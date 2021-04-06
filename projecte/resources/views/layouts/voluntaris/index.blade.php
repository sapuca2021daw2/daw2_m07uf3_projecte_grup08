@extends('layouts.app')

@section('content')
   <table class="table table-striped">
        <tr>
            <th>Nif</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Adreça</th>
            <th>Població</th>
            <th>Comarca</th>
            <th>Fixe</th>
            <th>Mòbil</th>
            <th>Correu</th>
            <th>Data Ingres</th>
            <th>Edat</th>
            <th>Professió</th>
            <th>Hores deidcades</th>
            <th>Nom ONG</th>
            <th></th>
        </tr>
    @foreach($voluntari as $row)
        <tr>
            <td>{{$row->nifTreballador}}</td>
            <td>{{$row->nomTreballador}}</td>
            <td>{{$row->cognomsTreballador}}</td>
            <td>{{$row->adrecaTreballador}}</td>
            <td>{{$row->poblacioTreballador}}</td>
            <td>{{$row->comarcaTreballador}}</td>
            <td>{{$row->fixeTreballador}}</td>
            <td>{{$row->mobilTreballador}}</td>
            <td>{{$row->correuTreballador}}</td>
            <td>{{$row->dataIngresTreballador}}</td>
            <td>{{$row->edat}}</td>
            <td>{{$row->professio}}</td>
            <td>{{$row->horesDedicades}}</td>
            <td>{{$row->nomAssociacio}}</td>
            <td>
                <div style="display:inline-block">
                <a href="{{ url('/voluntari/'.$row->id.'/edit') }}"><button class="btn btn-primary">Edita</button></a>
                <form class="delete_form" style="float: right; margin-left: 10px" method="post" action="{{url('voluntari/'.$row->id)}}">
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
               if (confirm("S'esborrarà aquest voluntari, vols continuar?")) {
                   return true;
               } else {
                   return false;
               }

           });
       });
   </script>

    <a href="{{ url('/voluntari/create') }}"><button class="btn btn-primary">Nou Voluntari</button>

@endsection


