<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use App\Models\Treballador;
use App\Models\Voluntari;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Date;

class voluntariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntari = DB::table('voluntari')->join('treballador', 'treballador.id', '=', 'voluntari.treballador_id')->join('associacio','associacio.id','=','treballador.associacio_id')->select('treballador.nifTreballador', 'treballador.nomTreballador', 'treballador.cognomsTreballador', 'treballador.adrecaTreballador', 'treballador.poblacioTreballador', 'treballador.comarcaTreballador', 'treballador.fixeTreballador', 'treballador.mobilTreballador', 'treballador.correuTreballador', 'treballador.dataIngresTreballador', 'voluntari.edat', 'voluntari.professio', 'voluntari.horesDedicades', 'voluntari.id', 'associacio.nomAssociacio')->get();        return view('layouts.voluntaris.index',  compact('voluntari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ong = Associacio::all()->toArray();
        return view('layouts.voluntaris.crea', compact('ong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treballador = new Treballador([
            'nifTreballador' => $request->get('nif'),
            'nomTreballador' => $request->get('nom'),
            'cognomsTreballador' => $request->get('cognoms'),
            'adrecaTreballador' => $request->get('adressa'),
            'poblacioTreballador' => $request->get('poblacio'),
            'comarcaTreballador' => $request->get('comarca'),
            'fixeTreballador' => $request->get('telefon'),
            'mobilTreballador' => $request->get('mobil'),
            'correuTreballador' => $request->get('correu'),
            'dataIngresTreballador' => date('Y-m-d'),
            'associacio_id' => $request->get('ong'),

        ]);

        if(count(DB::table('treballador')->where('nifTreballador','=',$treballador->nifTreballador)->get())>0){
            return redirect()->back()->withErrors('Nif d\'un altre treballador.');
        }else{

            DB::beginTransaction();

            $treballador->save();
            $t_id = $treballador->id;

            $voluntari = new Voluntari([
                'treballador_id' => $t_id,
                'edat' => $request->get('edat'),
                'professio' => $request->get('professio'),
                'horesDedicades' => $request->get('horesDedicades')

            ]);

            $voluntari->save();

            DB::commit();

            return redirect('/voluntari');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntari = DB::table('voluntari')->join('treballador', 'treballador.id', '=', 'voluntari.treballador_id')->select('treballador.nifTreballador', 'treballador.nomTreballador', 'treballador.cognomsTreballador', 'treballador.adrecaTreballador', 'treballador.poblacioTreballador', 'treballador.comarcaTreballador', 'treballador.fixeTreballador', 'treballador.mobilTreballador', 'treballador.correuTreballador', 'treballador.dataIngresTreballador', 'voluntari.edat', 'voluntari.professio', 'voluntari.horesDedicades', 'voluntari.id', 'treballador.associacio_id')->where('voluntari.id', '=', $id)->get();
        $voluntari = $voluntari[0];
        $ong=Associacio::all()->toArray();
        return view('layouts.voluntaris.edita', compact('voluntari', 'id','ong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $v=Voluntari::find($id);
        $t=Treballador::join('voluntari', 'treballador.id', '=', 'voluntari.treballador_id')->where('voluntari.id', '=', $id)->get();
        $t= $t[0];

        $t->nifTreballador = $request->get('nif');
        $t->nomTreballador = $request->get('nom');
        $t->cognomsTreballador = $request->get('cognoms');
        $t->adrecaTreballador = $request->get('adressa');
        $t->poblacioTreballador = $request->get('poblacio');
        $t->comarcaTreballador = $request->get('comarca');
        $t->fixeTreballador = $request->get('fixe');
        $t->mobilTreballador = $request->get('mobil');
        $t->correuTreballador = $request->get('correu');
        $t->dataIngresTreballador = $request->get('dataIngres');
        $t->associacio_id = $request->get('ong');
        
        $v->treballador_id = $t['id'];
        $v->edat = $request->get('edat');
        $v->professio = $request->get('professio');
        $v->horesDedicades = $request->get('horesDedicades');

        if(count(DB::table('voluntari')->join('treballador', 'treballador.id', '=', 'voluntari.treballador_id')->where([['treballador.nifTreballador','=',$t->nifTreballador],['voluntari.id','!=',$id]])->get())>0){
            return redirect()->back()->withErrors('Nif d\'un altre treballador.');
        }else{
            DB::beginTransaction();

            $t->save();
            $v->save();

            DB::commit();

            return redirect('/voluntari');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Voluntari::find($id);
        $t = Treballador::join('voluntari', 'treballador.id', '=', 'voluntari.treballador_id')->where('voluntari.id', '=', $id);

        DB::beginTransaction();

        $t->delete();
        $v->delete();
        
        DB::commit();

        return redirect('/voluntari');
    }

}
