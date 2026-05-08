<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIncidenciaRequest;
use App\Models\Incidencia;
use App\Services\IncidenciaService;
use App\Http\Requests\StoreIncidenciaRequest;
use Illuminate\Http\Request;



class IncidenciaController extends Controller
{
    protected $incidenciaService;

    public function __construct(IncidenciaService $incidenciaService)
    {
        $this->incidenciaService = $incidenciaService;
    }

    public function index()
    {        
        $incidencias = Incidencia::with(['propiedad', 'tipoIncidencia', 'estadoIncidencia'])->orderBy('created_at', 'desc')->get();

        return response()->json(['payload' => $incidencias, 'success' => true], 200);
    }

    public function store(Request $request)
    {
        $validate=$request->validate(['propiedad_id' => 'required|exists:propiedades,id',            
            'descripcion' => 'required|string',
            'tipo_incidencia_id' => 'required|exists:tipos_incidencia,id',
            'estado_incidencia_id' => 'required|exists:estados_incidencia,id',
            'fecha_reporte' => 'required|date']);

        $incidencia=$this->incidenciaService->storeIncidencia($validate);
        return response()->json(['payload' => $incidencia, 'success' => true], 200);
    }

    public function show(Incidencia $incidencia)
    {
        $incidencia->load(['propiedad', 'tipoIncidencia', 'estadoIncidencia']);
        return response()->json(['payload' => $incidencia, 'success' => true], 200);
    }

    public function update(UpdateIncidenciaRequest $request, Incidencia $incidencia)
    {
        $validate = $request->validated();
        $incidencia = $this->incidenciaService->updateIncidencia($incidencia, $validate);
        return response()->json(['payload' => $incidencia, 'success' => true], 200);
    }

    public function destroy(Incidencia $incidencia)
    {
        $this->incidenciaService->deleteIncidencia($incidencia);
        return response()->json(['success' => true], 200);
    }
    
}
