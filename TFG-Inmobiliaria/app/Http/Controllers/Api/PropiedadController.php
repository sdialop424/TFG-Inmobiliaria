<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Propiedad;

use App\Http\Requests\PropiedadRequest;
use Illuminate\Http\Request;




class PropiedadController extends Controller
{
    public function index()
    {
            $propiedades = Propiedad::all();
        

        return response()->json(['payload' => $propiedades, 'success' => true], 200);
    }

    

    public function store(Request $request)
    {
        $validate=$request->validate(['direccion' => 'required|string|max:255',
            'usuario_id' => 'required|exists:users,id',
            'tipo_propiedad_id' => 'required|exists:tipos_propiedad,id']);

        
        $propiedad = Propiedad::create($validate);
        

        return response()->json(['payload' => $propiedad, 'success' => true], 200);
    }

    public function show(Propiedad $propiedad)
    {
        return response()->json(['payload' => $propiedad, 'success' => true], 200);
    }

    

    public function update(PropiedadRequest $request, Propiedad $propiedad)
    {
        $validate=$request->validated();

        $propiedad->update($validate);
    
        return response()->json(['payload' => $propiedad, 'success' => true], 200);
    }

    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();
        
        return response()->json(['success' => true], 200);
    }
}