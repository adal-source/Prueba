<?php

namespace App\Http\Controllers;

use App\Models\Tbl_ope_peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TblOpePeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return view('index');
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
    //    srive para guradar datos en la bd
        print_r($_POST);
    //    $movieName = $request->post('movieName');
    //    $moviePrecio = $request->post('moviePrecio');
    //    $cantidad = $request->post('cantidad');
    //    $pago = $request->post('pago');
    //    $activo = $request->post('activo');

    //DB::table('tbl_ope_peliculas')->insert([
    //    'Pelicula_Nombre' => $movieName,
    //    'Pelicula_Precio' => $moviePrecio,
    //    'Pelicula_Entradas' => $cantidad,
    //    'Pelicula_Total' => $pago,
    //    'Pelicula_Activo' => $activo,
    //]);

        return redirect()->route('funcion.index')->with('success','¡Pagado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tbl_ope_peliculas $tbl_ope_peliculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tbl_ope_peliculas $tbl_ope_peliculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tbl_ope_peliculas $tbl_ope_peliculas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tbl_ope_peliculas $tbl_ope_peliculas)
    {
        //
    }
}
