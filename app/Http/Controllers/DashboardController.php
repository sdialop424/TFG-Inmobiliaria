<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        $incidencias_resueltas = $incidencias->where('estado_incidencia_id', 3)->count(); 
        $incidencias_pendientes = $incidencias->where('estado_incidencia_id', '!=', 3)->count();

        $usuarios_count = User::count();

        $ultimas_incidencias = Incidencia::with(['propiedad', 'tipoIncidencia', 'estadoIncidencia'])->latest()->take(5)->get();
        if (request('show_all')) {
            $ultimas_incidencias = Incidencia::with(['propiedad', 'tipoIncidencia', 'estadoIncidencia'])->latest()->get();
        }
        $ultimos_usuarios = User::latest()->take(5)->get();

        return view('dashboard.index', compact('propiedades_count', 'incidencias_resueltas', 'incidencias_pendientes', 'ultimas_incidencias'));
    }

}