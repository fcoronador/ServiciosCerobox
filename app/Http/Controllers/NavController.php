<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('clientes');
    }

    public function ClienteDetalle()
    {
        return view('detalles');
    }

    public function ControlServicios()
    {
        return view('servicios');
    }


}
