<?php

namespace App\Http\Controllers;

use App\centroscomerciale;
use Illuminate\Http\Request;

class CentrosComercialeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\centroscomerciale  $centroscomerciale
     * @return \Illuminate\Http\Response
     */
    public function show(centroscomerciale $centroscomerciale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\centroscomerciale  $centroscomerciale
     * @return \Illuminate\Http\Response
     */
    public function edit(centroscomerciale $centroscomerciale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\centroscomerciale  $centroscomerciale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, centroscomerciale $centroscomerciale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\centroscomerciale  $centroscomerciale
     * @return \Illuminate\Http\Response
     */
    public function destroy(centroscomerciale $centroscomerciale)
    {
        //
    }

    public function centrosPaginate(){
        $centros = \DB::table('centroscomerciales')->inRandomOrder()->paginate(8);
        return view("publicas.prevcentros",compact('centros'));
    }
}
