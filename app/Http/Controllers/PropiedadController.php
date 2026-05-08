<?php
namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use App\Models\TipoPropiedad;
use App\Models\User;
use App\Http\Requests\PropiedadRequest;
use Illuminate\Support\Facades\Auth;



class PropiedadController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $info = ['mostrarBotones' => $user->isAdmin()];

        $query = Propiedad::with(['tipoPropiedad', 'usuario']);

        if ($user->isAdmin()) {
            $propiedades = $query->paginate(10);
        } else {
            $propiedades = $query->where('usuario_id', $user->id)->paginate(10);
        }

        return view('propiedades.index', compact('propiedades', 'info'));
    }

    public function create()
    {
        abort_unless(Auth::user()->isAdmin(), 403);

        $tiposPropiedad = TipoPropiedad::all();
        $usuarios = User::all();
        return view('propiedades.create', compact('tiposPropiedad', 'usuarios'));
    }

    public function store(PropiedadRequest $request)
    {
        $validate = $request->validated();

        Propiedad::create($validate);

        return redirect()->route('propiedades.index')
        ->with('success', 'Propiedad creada exitosamente.');
    }

    public function show(Propiedad $propiedad)
    {
        abort_unless(Auth::user()->isAdmin() || Auth::id() === $propiedad->usuario_id, 403);

        $tiposPropiedad = TipoPropiedad::all();
        $usuarios = User::all();
        return view('propiedades.show', compact('propiedad', 'tiposPropiedad', 'usuarios'));
    }

    public function edit(Propiedad $propiedad)
    {
        abort_unless(Auth::user()->isAdmin(), 403);

        $tiposPropiedad = TipoPropiedad::all();
        $usuarios = User::all();
        return view('propiedades.edit', compact('propiedad', 'tiposPropiedad', 'usuarios'));
    }

    public function update(PropiedadRequest $request, Propiedad $propiedad)
    {
        $validate=$request->validated();

        $propiedad->update($validate);

        return redirect()->route('propiedades.index')
        ->with('success', 'Propiedad actualizada exitosamente.');
    }

    public function destroy(Propiedad $propiedad)
    {
        abort_unless(Auth::user()->isAdmin(), 403);

        $propiedad->delete();
        
        return redirect()->route('propiedades.index')
        ->with('success', 'Propiedad eliminada exitosamente.');
    }
}