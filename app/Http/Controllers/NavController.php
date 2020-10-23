<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    
    public function index()
    {
        return view('clientes');
    }


    public function ClienteDetalle()
    {
        return view('detalles');
    }

}
