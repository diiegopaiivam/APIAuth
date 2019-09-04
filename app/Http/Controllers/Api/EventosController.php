<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EventosController extends Controller
{
    public function cadastrar(Request $request){

        $eventos = $request->all();
        $eventos->save();

        return $eventos;
    }

    public function index(Eventos $eventos){

        $todosEventos = $eventos->all();

        return $todosEventos;
    }
}
