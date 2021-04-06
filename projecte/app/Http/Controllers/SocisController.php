<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use App\Models\Soci;
use App\Models\Tenir;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Date;

class socisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ong=Associacio::all()->toArray();
        $socis=Soci::all()->toArray();
        return view('layouts.socis.index',compact('ong','socis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ong = Associacio::all()->toArray();
        return view('layouts.socis.crea', compact('ong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $soci = new Soci([
            'nifSoci' => $request->get('nif'),
            'nomSoci' => $request->get('nom'),
            'cognomsSoci' => $request->get('cognoms'),
            'adrecaSoci' => $request->get('adressa'),
            'poblacioSoci' => $request->get('poblacio'),
            'comarcaSoci' => $request->get('comarca'),
            'fixeSoci' => $request->get('telefon'),
            'mobilSoci' => $request->get('mobil'),
            'correuSoci' => $request->get('correu'),

        ]);


        DB::beginTransaction();
        
        if(count(DB::table('socis')->where('nifSoci','=',$soci->nifSoci)->get())>0){
            return redirect()->back()->withErrors('Nif d\'un altre Soci.');
        }else{
            $soci->save();
        }

        
        $soc = $soci->id;

        $tenir = new Tenir([
            'soci_id' => $soc,
            'associacio_id' => $request->get('ong'),
            'quotaMensual' => $request->get('quota'),
            'dataAltaSoci' => date('Y-m-d'),
            'aportacioAnual' => $request->get('quota') * 12

        ]);

        $tenir->save();

        DB::commit();

        return redirect('/socis');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soci = Soci::find($id);
        $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $id)->get();

        return view('layouts.socis.mostra', compact('soci', 'ong'));
    }


    public function mostra(Request $request)
    {

        $nif = $request->get('nif');

        $soci = Soci::where('nifSoci', '=', $nif)->first();
        if ($soci) {
            $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();
        } else {
            $ong = "";
        }

        $llistaOng = Associacio::all()->toArray();
        return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        $soci = Soci::find($id);

        $soci->nifSoci = $request->get('nifSoci');
        $soci->nomSoci = $request->get('nomSoci');
        $soci->cognomsSoci = $request->get('cognomsSoci');
        $soci->adrecaSoci = $request->get('adrecaSoci');
        $soci->poblacioSoci = $request->get('poblacioSoci');
        $soci->comarcaSoci = $request->get('comarcaSoci');
        $soci->fixeSoci = $request->get('fixeSoci');
        $soci->mobilSoci = $request->get('mobilSoci');
        $soci->correuSoci = $request->get('correuSoci');

        $soci->save();

        $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();
        $llistaOng = Associacio::all()->toArray();


        return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asso = Tenir::find($id);
        $soci = Soci::find($asso->soci_id);
        $asso->delete();
        $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();

        $llistaOng = Associacio::all()->toArray();

        return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng'));
    }

    public function aportacio(Request $request)
    {
        $idSoci = $request->get('idSoci');
        $id = $request->get('id');
        $te = Tenir::find($id);
        $aportacio = $request->get('aportacio');

        $te->quotaMensual = $aportacio;
        $te->aportacioAnual = $aportacio * 12;
        $te->save();
        
        $soci = Soci::find($idSoci);
        $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();
        $llistaOng = Associacio::all()->toArray();

        return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng'));
        
    }

    public function addSociOng(Request $request)
    {

        $asso = new Tenir([
            'soci_id' => $request->get('idSoci'),
            'associacio_id' => $request->get('ong'),
            'dataAltaSoci' => date('Y-m-d'),
            'quotaMensual' => $request->get('quota'),
            'aportacioAnual' => $request->get('quota') * 12
        ]);

        $ask = Tenir::where('soci_id', '=', $request->get('idSoci'))->where('associacio_id', '=', $request->get('ong'))->first();
        $soci = Soci::find($request->get('idSoci'));

        if (!$ask) {
            $asso->save();
            $llistaOng = Associacio::all()->toArray();
            $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();

            return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng'));
        } else {
            $llistaOng = Associacio::all()->toArray();
            $ong = Associacio::join('tenir', 'associacio.id', '=', 'associacio_id')->where('soci_id', '=', $soci->id)->get();

            return view('layouts.socis.mostra', compact('soci', 'ong', 'llistaOng', 'ask'));
        }
    }

    public function mostraPerOng(Request $request){
        $ong=Associacio::all()->toArray();
        $socis=Soci::all()->toArray();
        $idOng=$request->get('ongSocis');
        $socisOng = Soci::join('tenir', 'socis.id', '=', 'soci_id')->where('associacio_id', '=', $idOng)->get();
        $ongName=Associacio::find($idOng);
        $ongName=$ongName->nomAssociacio;
        return view('layouts.socis.index', compact('socisOng', 'socis','ong','ongName'));
    }



}
