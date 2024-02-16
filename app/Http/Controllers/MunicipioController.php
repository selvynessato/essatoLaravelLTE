<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;
use App\Models\Municipio;

class MunicipioController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::all();
        return view('Municipio')->with("departamentos", $departamentos);
    }

    public function muni()
    {
        $datos = Municipio::all();
        return view('Municipio')->with("datos", $datos);
    }
  
    public function create(Request $request)
    {
        try {
            DB::table('municipio')->insert([
                'id_municipio' => $request->codigo,
                'nombre_municipio' => $request->municipio,
            ]);
            return back()->with("mensaje", "correcto");
        } catch (\Exception $e) { // Corrección de error de sintaxis en la excepción
            return back()->with("mensaje", "incorrecto");
        }
    }
  
    public function edit(Request $request)
    {
        try {
            $id = $request->codigo;
            $nombreMunicipio = $request->municipio;

            $sql = DB::table('municipio')
                ->where('id_municipio', $id)
                ->update(['nombre_municipio'=> $nombreMunicipio]);
                
            if ($sql) {
                return back()->with("mensaje", "correcto");
            } else {
                return back()->with("mensaje", "incorrecto");
            }
        } catch(\Throwable $th) { // Corrección de error de sintaxis en la excepción
            return back()->with("mensaje", "incorrecto");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::table('municipio')->where('id_municipio', $id)->delete(); // Corrección de nombre de tabla 'minicipio' a 'municipio'

            if ($sql) {
                return back()->with("mensaje", "correcto");
            } else {
                return back()->with("mensaje", "incorrecto");
            }
        } catch (\Throwable $th) {
            return back()->with("mensaje", "incorrecto");
        }
    }
}