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
            <th>Càrrec</th>
            <th>Paga de SS</th>
            <th>% IRPF</th>
            <th>Nom ONG</th>
            <th></th>
        </tr>
    @foreach($professional as $row)
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
            <td>{{$row->carrec}}</td>
            <td>{{$row->seguretatSocial}}</td>
            <td>{{$row->percentatgeIRPF}}</td>
            <td>{{$row->nomAssociacio}}</td>
            <td>
                <div style="display:inline-block">
                <a href="{{ url('/professional/'.$row->id.'/edit') }}"><button class="btn btn-primary">Edita</button></a>
                <form class="delete_form" style="float: right; margin-left: 10px" method="post" action="{{url('professional/'.$row->id)}}">
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
               if (confirm("S'esborrarà aquest professional, vols continuar?")) {
                   return true;
               } else {
                   return false;
               }

           });
       });
   </script>

    <a href="{{ url('/professional/create') }}"><button class="btn btn-primary">Nou professional</button>

@endsection


