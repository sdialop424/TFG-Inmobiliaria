<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
{
    $validated = $request->validated();

    // Asignar contraseña encriptada
    $validated['password'] = Hash::make($validated['password']);

    // Asignar rol por defecto (usuario común)
    $validated['rol_id'] = 2;

    // Crear usuario
    $user = User::create($validated);

    // Loguear automáticamente
    Auth::login($user);

    return redirect()->route('dashboard.index');
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Rol::all();
        return view('users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Rol::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validate = $request->validated();

        $user->update($validate);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_if($user->id === Auth::id(), 403, 'No puedes eliminarte a ti mismo');
        $user->delete();
        return redirect(route('users.index'));
    }

    public function restore(User $user) {
        $user->restore();
        return redirect(route('users.index'));
    }

    public function showChangePasswordForm()
    {
        return view('users.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.show', Auth::id())->with('success', 'Contraseña actualizada correctamente.');
    }
}