<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $propiedades =[];
        if($user->isAdmin()) {
            $propiedades = Propiedad::all();
        } else {
             $propiedades = Propiedad::where('usuario_id', $user->id)->get();
        }

        $propiedades_count = $propiedades->count();

        //Todo: Recoger inciendencias relacionadas con las propiedades del usuario
        $incidencias = [];
        if ($user->isAdmin()) {
            $incidencias = Incidencia::orderBy('created_at', 'desc')->get();
        } else {
            $incidencias = Incidencia::whereHas('propiedad', function($query) use ($user) {
                $query->where('usuario_id', $user->id);
            })->orderBy('created_at', 'desc')->get();
        }

        $incidencias_resueltas = $incidencias->where('estado_incidencia_id', 1)->count(); // Asumiendo que 1 es resuelto
        $incidencias_pendientes = $incidencias->where('estado_incidencia_id', '!=', 1)->count();

        $usuarios_count = \App\Models\User::count();

        $ultimas_incidencias = Incidencia::with(['propiedad', 'tipoIncidencia', 'estadoIncidencia'])->latest()->take(5)->get();
        $ultimos_usuarios = \App\Models\User::latest()->take(5)->get();

        return view('dashboard.index', compact('propiedades_count', 'incidencias_resueltas', 'incidencias_pendientes', 'usuarios_count', 'ultimas_incidencias', 'ultimos_usuarios'));
    }

}