<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacion;
use App\Jobs\AnalizarOperacionJob;

class OperacionController extends Controller
{
    public function index()
    {
        $operaciones = Operacion::latest()->take(10)->get();

        return view('suma', compact('operaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_uno' => 'required|integer',
            'numero_dos' => 'required|integer',
        ]);

        $resultado = $request->numero_uno + $request->numero_dos;

        $operacion = Operacion::create([
            'nombre' => $request->nombre,
            'numero_uno' => $request->numero_uno,
            'numero_dos' => $request->numero_dos,
            'resultado' => $resultado,
        ]);

        AnalizarOperacionJob::dispatch($operacion->id);

        return redirect()->route('suma.index')
            ->with('success', 'Operación guardada correctamente.')
            ->with('resultado', $resultado)
            ->with('nombre', $request->nombre);
    }
}