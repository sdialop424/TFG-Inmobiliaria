<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function login (Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token], 200);

            #return redirect()->intended('dashboard');
        }

            return response()->json(['error' => 'Las credenciales no son correctas.'], 401);


        

        #return back()->withErrors([
         #   'email' => 'Las credenciales no son correctas.',
        #]);
    }

    public function logout ()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}