<?php

namespace App\Http\Controllers;

use App\servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios =  servicio::all();
        return response($servicios, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = servicio::create($request->all());
        return response('servicio creado', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicio $servicio)
    {
        $servicio->update($request->all());
        return response('servicio actualizado', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicio $servicio)
    {
        $servicio->delete();
        return response('Se elimino', 200);
    }
}
