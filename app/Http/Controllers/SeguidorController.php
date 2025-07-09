<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SeguidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver esta página.');
        }
        $accion = 'listar';
        $seguidores = Seguidor::paginate(10);
        return view('seguidores',compact('seguidores', 'accion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver esta página.');
        }
        $accion = 'crear';
        return view('seguidores',compact( 'accion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación de los campos
        $validated = $request->validate([
            'nombre'     => 'required|string|max:255',
            'documento'  => 'required|string|max:50|unique:seguidores,documento',
            'lider'      => 'nullable|max:5',
            'celular'    => 'nullable|string|max:20',
            'correo'     => 'nullable|email|max:100',
            'direccion'  => 'nullable|string|max:100',
            'municipio'  => 'nullable|string|max:100',
            'puesto'     => 'nullable|string|max:100',
            'mesa'       => 'nullable|string|max:50',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:1024', // 1MB
        ]);

        $validated['lider'] = $request->input('lider')=="on"?1:0; // Asignar el ID del usuario autenticado

        // Procesar la foto si fue subida
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('/', 'seguidores'); // Guarda en public/seguidores
            $validated['foto'] = $fotoPath;
        }

        // Crear el seguidor
        Seguidor::create($validated);

        return redirect()->route('seguidores.index')->with('success', 'Seguidor registrado correctamente.');
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
