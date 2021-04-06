<?php

namespace App\Http\Controllers;

use App\Models\Associacio;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Usuari;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariController extends Controller
{

    /* public function __construct()
     {

     }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

            if ($user && $user->rol == 1) {
                $usuaris = User::all()->toArray();
                return view('layouts.usuaris.index', compact('usuaris'));
            }
            return redirect('/');
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->rol == 1) {
            return view('layouts.usuaris.crea');
        }
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $usuari = User::find($id);
        return view('layouts.usuaris.edita', compact('usuari', 'id'));
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

        $usuari = User::find($id);

        if($request->get('rol')=='on'){
            $rol=1;
        }else{
            $rol=0;
        }
        $usuari->name = $request->get('nomUsuari');
        $usuari->email = $request->get('correu');
        $usuari->nom = $request->get('nom');
        $usuari->cognoms = $request->get('cognoms');
        $usuari->mobil = $request->get('mobil');
        $usuari->rol = $rol;

        if(count(DB::table('users')->where([['email','=',$usuari->email], ['id','!=',$id]])->get())>0){
            return redirect()->back()->withErrors('Correu en ús per un altre usuari.');
        }else{
            $usuari->save();
            return redirect('/usuaris');
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
        $user = Auth::user();
        if ($user->rol == 1) {
            $usuari= User::find($id);
            $usuari->delete();

            return redirect('/usuaris');
        }
        return redirect('/');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function reset($id)
    {
        $usuari = User::find($id);
        $token = Str::random(60);
        $usuari->remember_token = $token;
        $usuari->save();

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'id' => $id]);

    }

    public function passwordUpdate(Request $request)
    {

        $token = $request->get('token');
        $oldPassword = $request->get('old_password');
        $nouPassword = $request->get('password');
        $confirmaPassword = $request->get('password_confirmation');
        $id = $request->get('id');

        $usuari = User::find($id);

        if ($usuari['remember_token'] == $token && Hash::check($oldPassword, $usuari['password']) && $nouPassword == $confirmaPassword) {

            $usuari->password = Hash::make($nouPassword);
            $usuari->save();
            return redirect('usuaris/' . $usuari->id . '/edit')->with('resposta', 'Contrasenya actualitzada correctament')->withInput();
        } else {
            return "mal";
        }

    }
}
