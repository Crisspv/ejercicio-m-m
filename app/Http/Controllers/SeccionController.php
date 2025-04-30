<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use App\Http\Requests\StoreSeccionRequest;
use App\Http\Requests\UpdateSeccionRequest;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
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
    public function store(StoreSeccionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $seccion = Seccion::with('alumnos')->findOrFail($id);
        $alumnos = Alumno::all();
        return view('secciones.show', compact('seccion', 'alumnos'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeccionRequest $request, Seccion $seccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
    
    public function asignarAlumnos(Request $request, $id)
    {
        $seccion = Seccion::findOrFail($id);
        $seccion->alumnos()->syncWithoutDetaching($request->input('alumnos', []));
        return redirect()->route('secciones.show', $seccion->id)->with('success', 'Alumnos inscritos correctamente.');
    }

}
