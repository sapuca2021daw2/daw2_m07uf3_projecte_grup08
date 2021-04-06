<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class ongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ong = DB::select("Select * from associacio");
        return view('layouts.ong.index', compact('ong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.ong.crea');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->get('utilitat') == 'on' ? $utilitat = '1' : $utilitat = '0';

        $associacio = new Associacio([

            'cif' => $request->get('cif'),
            'nomAssociacio' => $request->get('nom'),
            'adrecaAssociacio' => $request->get('adressa'),
            'poblacioAssociacio' => $request->get('poblacio'),
            'comarcaAssociacio' => $request->get('comarca'),
            'tipus' => $request->get('tipus'),
            'esDeclarada' => $utilitat,

        ]);

        if(count(DB::table('associacio')->where('cif','=',$associacio->cif)->get())>0){
            return redirect()->back()->withErrors('Cif d\'una altra associació.');
        }else{
            $associacio->save();
            return redirect('/ong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ong=Associacio::find($id);

        return view('layouts.ong.edita', compact('ong', 'id'));
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

        $ong=Associacio::find($id);

        $request->get('utilitat')== 'on' ? $utilitat = '1' : $utilitat = '0';
        $ong->cif = $request->get('cif');
        $ong->nomAssociacio = $request->get('nom');
        $ong->adrecaAssociacio = $request->get('adressa');
        $ong->poblacioAssociacio = $request->get('poblacio');
        $ong->comarcaAssociacio = $request->get('comarca');
        $ong->tipus = $request->get('tipus');
        $ong->esDeclarada = $utilitat;

        if(count(DB::table('associacio')->where([['cif','=',$ong->cif],['id','!=',$id]])->get())>0){
            return redirect()->back()->withErrors('Cif d\'una altra associació.');
        }else{
            $ong->save();
            return redirect('/ong');
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

        $ong=Associacio::find($id);
        $ong->delete();

        return redirect('/ong');

    }
}
