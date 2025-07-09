<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
         // Validación de los campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Extraer credenciales
        $credentials = [
            'email' => htmlspecialchars($request->input('email')),
            'password' => htmlspecialchars($request->input('password'))
        ];

        // Intentar autenticación
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home'); // o donde desees redirigir
        }

        // Si falla, devolver con error
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.'
        ])->onlyInput('email');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'));

    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
