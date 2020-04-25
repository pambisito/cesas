<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Academia;
use App\Examen;
use App\RegistroExamen;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DBA.examenDBA');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro_examen = new RegistroExamen();
        $registro_examen->fecha = $request->fecha;
        $registro_examen->save();

        $academia = Academia::all();
        foreach ($academia as $item) {
            $examen = new Examen();
            $examen->DNI = $item->DNI;
            $examen->fecha = $request->fecha;
            $examen->puntajeSM = 0;
            $examen->puntajeVilla = 0;
            $examen->puntajeCallao = 0;
            $examen->save();
        }
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

    public function obtenerFecha() {
        $fechaUltima = RegistroExamen::all()->last()->fecha;
        return redirect()->route('examen.ingresarNotas', ['fecha' => $fechaUltima]);
    }

    public function ingresarNotas($fechaUltima) {
        $fechas = RegistroExamen::all();
        $persona = User::all();
        /* foreach ($persona as $objeto) {
            foreach ($objeto->examenes as $persona_examen) {
                if($persona_examen->fecha == $fechaUltima) {
                    var_dump($objeto->apellidoPaterno);
                    echo "</br>";
                    var_dump($persona_examen->DNI);
                    echo "</br>";
                    var_dump($persona_examen->fecha);
                    echo "</br>";
                    var_dump($persona_examen->puntajeSM);
                }
            }    
        } */
        return view('DBA.ingresarNotasAcademia', compact('fechas', 'fechaUltima', 'persona'));
    }
    
    public function actualizarFecha(Request $request) {
        return redirect()->route('examen.ingresarNotas', ['fecha' => $request->fechaUltima]);
    }

    public function actualizarNotas(Request $request) {
        for ($i=0; $i < $request->cantidad; $i++) { 
            $persona_examen = Examen::where('DNI', $request->DNI[$i])->where('fecha', $request->fecha[$i])->update(
                [
                    'puntajeSM' => $request->puntajeSM[$i],
                    'puntajeVilla' => $request->puntajeVilla[$i],
                    'puntajeCallao' => $request->puntajeCallao[$i]
                ]
            );
        }
        return back();

        /* for ($i=0; $i < $request->cantidad; $i++) {
            $asistencia = new Asistencia();
            $asistencia->DNI = $request->DNI[$i];
            $asistencia->tipo = $request->tipo[$i];
            $asistencia->observacion = $request->observacion[$i];
            $asistencia->fecha = date("Y-m-d");
            $asistencia->save();
        }
        return back(); */

    }
}
