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
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver esta página.');
        }

        if($request->input('id')) {
           // Validación de los campos
            $validated = $request->validate([
                'nombre'     => 'required|string|max:255',
                'documento'  => 'required|string|max:50|unique:seguidores,documento,' . $request->input('id'),
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
                //borrar la anterior foto si existe
                $seguidor = Seguidor::findOrFail($request->input('id'));
                if ($seguidor->foto && Storage::disk('seguidores')->exists($seguidor->foto)) {
                    Storage::disk('seguidores')->delete($seguidor->foto);
                }


                $fotoPath = $request->file('foto')->store('/', 'seguidores'); // Guarda en public/seguidores
                $validated['foto'] = $fotoPath;
            }

            // Actualizar el seguidor
            if(auth()->user()->role=='admin' || auth()->user()->id==$request->input('id')) {

                Seguidor::where('id', $request->input('id'))->update($validated);
                return redirect()->route('seguidores.index')->with('success', 'Seguidor actualizado correctamente.');
            }else{
                return redirect()->route('seguidores.edit')->withErrors([
            'permisos' => 'No tienes permiso para realizar esta acción.'
        ]);
            }

        }
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

         if(auth()->user()->role=='admin' || auth()->user()->id==$request->input('id')) {
        // Crear el seguidor
        Seguidor::create($validated);

        return redirect()->route('seguidores.index')->with('success', 'Seguidor registrado correctamente.');
         }else{
            return redirect()->route('seguidores.create')->withErrors([
            'permisos' => 'No tienes permiso para crear un seguidor.'
        ]);
         }
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
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver esta página.');
        }
        $accion = 'editar';
        $seguidor = Seguidor::findOrFail($id);
        return view('seguidores', compact('seguidor', 'accion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $seguidor = Seguidor::findOrFail($id);

        // Eliminar la foto si existe
        if ($seguidor->foto && Storage::disk('seguidores')->exists($seguidor->foto)) {
            Storage::disk('seguidores')->delete($seguidor->foto);
        }

        // Eliminar el seguidor
        $seguidor->delete();

        return redirect()->route('seguidores.index')->with('success', 'Seguidor eliminado correctamente.');
    }
}
