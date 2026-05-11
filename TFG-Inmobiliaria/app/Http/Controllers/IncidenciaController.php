<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIncidenciaRequest;
use App\Models\EstadoIncidencia;
use App\Models\Incidencia;
use App\Models\Propiedad;
use App\Models\TipoIncidencia;
use App\Models\User;
use App\Services\IncidenciaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIncidenciaRequest;


class IncidenciaController extends Controller
{
    protected $incidenciaService;

    public function __construct(IncidenciaService $incidenciaService)
    {
        $this->incidenciaService = $incidenciaService;
    }

    public function index()
    {
        $user = Auth::user(); 
        $info = ['mostrarBotones' => $user->isAdmin()];

        $query = Incidencia::with(['propiedad', 'tipoIncidencia', 'estadoIncidencia'])->orderBy('created_at', 'desc');

        if (! $user->isAdmin()) {
            $query->whereHas('propiedad', function($query) use ($user) {
                $query->where('usuario_id', $user->id);
            });
        }

        $incidencias = $query->paginate(10);

        return view('incidencias.index', compact('incidencias', 'info'));
    }

    public function create(Request $request)
    {
        $estados = EstadoIncidencia::all();
        $tipos = TipoIncidencia::all();
        $user = Auth::user();
        $propiedades = $user->isAdmin() ? Propiedad::all() : Propiedad::where('usuario_id', $user->id)->get();
        $usuarios = User::all();
        $selectedPropiedadId = $request->query('propiedad_id');

        return view('incidencias.create', compact('estados', 'tipos', 'propiedades', 'usuarios', 'selectedPropiedadId'));
    }

    public function store(StoreIncidenciaRequest $request)
    {
        $validate=$request->validated();

        $this->incidenciaService->storeIncidencia($validate);
        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada exitosamente');
    }

    public function show(Incidencia $incidencia)
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
        $propiedades = Propiedad::all();
        } else {
        $propiedades = $user->propiedades;
        }
        
        return view('incidencias.show', compact('incidencia', 'propiedades'));
    }

    public function edit(Incidencia $incidencia)
    {
        $estados = EstadoIncidencia::all(); 
        $tipos = TipoIncidencia::all();
        $user = Auth::user();
        $propiedades = $user->isAdmin() ? Propiedad::all() : Propiedad::where('usuario_id', $user->id)->get();
        $usuarios = User::all();
        return view('incidencias.edit', compact('incidencia', 'estados', 'tipos', 'propiedades', 'usuarios'));
    }

    public function update(UpdateIncidenciaRequest $request, Incidencia $incidencia)
    {
        $validate = $request->validated();
        $this->incidenciaService->updateIncidencia($incidencia, $validate);
        return redirect()->route('incidencias.index')->with('success', 'Incidencia actualizada exitosamente');
    }

    public function destroy(Incidencia $incidencia)
    {
        $this->incidenciaService->deleteIncidencia($incidencia);
        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada exitosamente');
    }
    
    public function dashboard()
{
    $user = Auth::user(); 

    $incidencias = Incidencia::with(['propiedad', 'estadoIncidencia'])->latest()->take(5)->get();
    return view('dashboard', compact('incidencias'));
}
}
