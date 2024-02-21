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
        //
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
        //srive para guradar datos en la bd
        //print_r($_POST);
        $movieName = $request->post('movieName');
        $moviePrecio = $request->post('moviePrecio');

    DB::table('tbl_ope_funcion')->insert([
        'Funcion_Nombre' => $movieName,
        'Funcion_Imagen' => $moviePrecio,
    ]);

        return redirect()->route('peliculas.index')->with('success','¡Agregado con exito!');
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
