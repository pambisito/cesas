<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Colegio;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->DNI == '74415678') {
            return view('DBA.registrarColegioDBA');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'DNI' => ['unique:persona'],
        ]);

        $persona = new User();
        $persona->DNI = $request->DNI;
        $persona->password = Hash::make($request->DNI);
        $persona->apellidoPaterno = $request->apellidoPaterno;
        $persona->apellidoMaterno = $request->apellidoMaterno;
        $persona->nombres = $request->nombres;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->sexo = $request->sexo;
        $persona->direccion = $request->direccion;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $persona->celular = $request->celular;
        $persona->save();
        
        $colegio = new Colegio();
        $colegio->DNI = $request->DNI;
        $colegio->ano = $request->ano;
        $colegio->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
