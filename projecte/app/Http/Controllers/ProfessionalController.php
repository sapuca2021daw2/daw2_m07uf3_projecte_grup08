<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use App\Models\Treballador;
use App\Models\Professional;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Date;

class professionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professional = DB::table('professional')->join('treballador', 'treballador.id', '=', 'professional.treballador_id')->join('associacio','associacio.id','=','treballador.associacio_id')->select('treballador.nifTreballador', 'treballador.nomTreballador', 'treballador.cognomsTreballador', 'treballador.adrecaTreballador', 'treballador.poblacioTreballador', 'treballador.comarcaTreballador', 'treballador.fixeTreballador', 'treballador.mobilTreballador', 'treballador.correuTreballador', 'treballador.dataIngresTreballador', 'professional.carrec', 'professional.seguretatSocial', 'professional.percentatgeIRPF', 'professional.id', 'associacio.nomAssociacio')->get();
        return view('layouts.professionals.index',  compact('professional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ong = Associacio::all()->toArray();
        return view('layouts.professionals.crea', compact('ong'));
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

            $professional = new Professional([
                'treballador_id' => $t_id,
                'carrec' => $request->get('carrec'),
                'seguretatSocial' => $request->get('seguretatSocial'),
                'percentatgeIRPF' => $request->get('percentatgeIRPF')

            ]);

            $professional->save();

            DB::commit();

            return redirect('/professional');
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
        $professional = DB::table('professional')->join('treballador', 'treballador.id', '=', 'professional.treballador_id')->select('treballador.nifTreballador', 'treballador.nomTreballador', 'treballador.cognomsTreballador', 'treballador.adrecaTreballador', 'treballador.poblacioTreballador', 'treballador.comarcaTreballador', 'treballador.fixeTreballador', 'treballador.mobilTreballador', 'treballador.correuTreballador', 'treballador.dataIngresTreballador', 'professional.carrec', 'professional.seguretatSocial', 'professional.percentatgeIRPF', 'professional.id', 'treballador.associacio_id')->where('professional.id', '=', $id)->get();
        $professional = $professional[0];
        $ong=Associacio::all()->toArray();
        return view('layouts.professionals.edita', compact('professional', 'id', 'ong'));
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

        $p=Professional::find($id);
        $t=Treballador::join('professional', 'treballador.id', '=', 'professional.treballador_id')->where('professional.id', '=', $id)->get();
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

        $p->treballador_id = $t['id'];
        $p->carrec = $request->get('carrec');
        $p->seguretatSocial = $request->get('seguretatSocial');
        $p->percentatgeIRPF = $request->get('percentatgeIRPF');

        if(count(DB::table('professional')->join('treballador', 'treballador.id', '=', 'professional.treballador_id')->where([['treballador.nifTreballador','=',$t->nifTreballador],['professional.id','!=',$id]])->get())>0){
            return redirect()->back()->withErrors('Nif d\'un altre treballador.');
        }else{
            DB::beginTransaction();
            $t->save();
            $p->save();
            DB::commit();

            return redirect('/professional');
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
        $p = Professional::find($id);
        $t = Treballador::join('professional', 'treballador.id', '=', 'professional.treballador_id')->where('professional.id', '=', $id);

        DB::beginTransaction();

        $t->delete();
        $p->delete();

        DB::commit();

        return redirect('/professional');
    }

}
