<?php

namespace App\Http\Controllers;

use App\Models\Tbl_ope_funcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TblOpeFuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos=Tbl_ope_funcion::all();
        return view('index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   srive para guradar datos en la bd
        print_r($_POST);
    //    $newName = $request->post('newName');
    //    $movieImage = $request->post('movieImage');

    //DB::table('tbl_ope_funcions')->insert([
    //    'Funcion_Nombre' => $newName,
    //    'Funcion_Imagen' => $movieImage,
    //]);

        return redirect()->route('funcion.index')->with('success','¡Nueva Pelicula!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tbl_ope_funcion $tbl_ope_funcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tbl_ope_funcion $tbl_ope_funcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tbl_ope_funcion $tbl_ope_funcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tbl_ope_funcion $tbl_ope_funcion)
    {
        //
    }
}
