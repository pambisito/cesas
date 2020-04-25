<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Academia;
use App\Examen;
use App\RegistroExamen;

class AcademiaController extends Controller
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
            return view('DBA.registrarAcademiaDBA');
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
        
        $academia = new Academia();
        $academia->DNI = $request->DNI;
        $academia->save();

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

    public function reporteNotasPDF() {
        require('fpdf/fpdf.php');

        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'¡Mi primera página pdf con FPDF!');
        $pdf->Output();
    }

    public function notaGeneral() {
        $examen = Examen::where('DNI', Auth::user()->DNI)->get();
        return view('Academia.notasReporteGeneral', compact('examen'));
    }
    
    public function obtenerMes() {
        $mesActual = date("n", strtotime(RegistroExamen::all()->last()->fecha));
        switch ($mesActual) {
            case '1': $mesActual = "enero"; break;
            case '2': $mesActual = "febrero"; break;
            case '3': $mesActual = "marzo"; break;
            case '4': $mesActual = "abril"; break;
            case '5': $mesActual = "mayo"; break;
            case '6': $mesActual = "junio"; break;
            case '7': $mesActual = "julio"; break;
            case '8': $mesActual = "agosto"; break;
            case '9': $mesActual = "setiembre"; break;
            case '10': $mesActual = "octubre"; break;
            case '11': $mesActual = "noviembre"; break;
            case '12': $mesActual = "diciembre"; break;
        }
        return redirect()->route('academia.mostrarNotasMensual', ['mes' => $mesActual]);
    }  

    public function mostrarNotasMes($mesActual) {
        switch ($mesActual) {
            case 'enero': $mesActual = "1"; break;
            case 'febrero': $mesActual = "2"; break;
            case 'marzo': $mesActual = "3"; break;
            case 'abril': $mesActual = "4"; break;
            case 'mayo': $mesActual = "5"; break;
            case 'junio': $mesActual = "6"; break;
            case 'julio': $mesActual = "7"; break;
            case 'agosto': $mesActual = "8"; break;
            case 'setiembre': $mesActual = "9"; break;
            case 'octubre': $mesActual = "10"; break;
            case 'noviembre': $mesActual = "11"; break;
            case 'diciembre': $mesActual = "12"; break;
        }
        $misMeses = [$mesActual];
        $mesInicial = date("n", strtotime(RegistroExamen::all()->first()->fecha));
        $mesFinal = date("n", strtotime(RegistroExamen::all()->last()->fecha));
        $meses = [1 => "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "setiembre", "octubre", "noviembre", "diciembre"];
        for ($i=$mesInicial; $i <= $mesFinal; $i++) { 
            array_push($misMeses, $meses[$i]);
        }
        $examen = Examen::where('DNI', Auth::user()->DNI)->get();
        $dataFecha = "";
        $dataPuntajeSM = "";
        $dataPuntajeVilla = "";
        $dataPuntajeCallao = "";
        $colorSM = "";
        $colorVilla = "";
        $colorCallao = "";
        foreach ($examen as $item) {
            if (date("n", strtotime($item->fecha)) == $mesActual ) {
                $dataFecha .= "\"".date("d/m/Y", strtotime($item->fecha))."\",";
                $dataPuntajeSM .= "\"".$item->puntajeSM."\",";
                $dataPuntajeVilla .= "\"".$item->puntajeVilla."\",";
                $dataPuntajeCallao .= "\"".$item->puntajeCallao."\",";
                $colorSM .= "'rgba(255, 205, 86, 0.5)',";
                $colorVilla .= "'rgba(255, 159, 64, 0.5)',";
                $colorCallao .= "'rgba(54, 162, 235, 0.5)',";
                
            }
        }
        return view('Academia.notasReporteMensual', compact('colorSM', 'colorVilla', 'colorCallao', 
                                                            'misMeses', 'mesInicial', 'mesFinal',
                                                            'dataFecha', 'dataPuntajeSM', 'dataPuntajeVilla', 'dataPuntajeCallao'));
    }

    public function actualizarMes(Request $request) {
        return redirect()->route('academia.mostrarNotasMensual', ['mes' => $request->mesActual]);
    }
}
