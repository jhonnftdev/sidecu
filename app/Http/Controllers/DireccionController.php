<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;

class DireccionController extends Controller
{

    // Redirigir al listado
    public function index()
    {
        return redirect()->route('direcciones.listar');
    }


    // Vista crear direccion
    public function create()
    {
        return view('direcciones.crear');
    }


    // Vista listar direcciones + BUSQUEDA
    public function listar(Request $request)
    {

        $query = Direccion::query();

        if ($request->buscar) {
            $query->where(function($q) use ($request){
                $q->where('calle_principal','like','%'.$request->buscar.'%')
                  ->orWhere('calle_secundaria','like','%'.$request->buscar.'%')
                  ->orWhere('referencia','like','%'.$request->buscar.'%')
                  ->orWhere('observacion','like','%'.$request->buscar.'%');
            });
        }

        if ($request->canton) {
            $query->where('canton','like','%'.$request->canton.'%');
        }

        $direcciones = $query->orderBy('id','desc')->paginate(10);

        return view('direcciones.listar', compact('direcciones'));
    }


    // Guardar nueva referencia
    public function store(Request $request)
    {
        $request->validate([
            'canton' => 'required|string|max:100',
            'calle_principal' => 'required|string|max:150',
            'calle_secundaria' => 'required|string|max:150',
            'referencia' => 'required|string|max:255',
            'observacion' => 'nullable|string|max:255'
        ]);

        $request->merge([
            'canton' => strtoupper($request->canton),
            'calle_principal' => strtoupper($request->calle_principal),
            'calle_secundaria' => strtoupper($request->calle_secundaria),
            'referencia' => strtoupper($request->referencia),
            'observacion' => strtoupper($request->observacion)
        ]);

        $existe = Direccion::where('canton', $request->canton)
            ->where('calle_principal', $request->calle_principal)
            ->where('calle_secundaria', $request->calle_secundaria)
            ->where('referencia', $request->referencia)
            ->exists();

        if ($existe) {
            return redirect()->back()
                ->with('error', '⚠️ Esta dirección ya existe en el sistema.');
        }

        Direccion::create($request->all());

        return redirect()->route('direcciones.listar')
            ->with('success', '✅ Referencia registrada correctamente');
    }


    // Mostrar registro
    public function show($id)
    {
        return Direccion::findOrFail($id);
    }


    // Vista editar
    public function edit($id)
    {
        $direccion = Direccion::findOrFail($id);

        return view('direcciones.editar', compact('direccion'));
    }


    // Actualizar
    public function update(Request $request, $id)
    {
        $request->validate([
            'canton' => 'required',
            'calle_principal' => 'required',
            'calle_secundaria' => 'required',
            'referencia' => 'required'
        ]);

        $ref = Direccion::findOrFail($id);

        $ref->update([
            'canton' => strtoupper($request->canton),
            'calle_principal' => strtoupper($request->calle_principal),
            'calle_secundaria' => strtoupper($request->calle_secundaria),
            'referencia' => strtoupper($request->referencia),
            'observacion' => strtoupper($request->observacion)
        ]);

        return redirect()->route('direcciones.listar')
            ->with('success','✏️ Dirección actualizada correctamente');
    }


    // Eliminar
    public function destroy($id)
    {
        Direccion::destroy($id);

        return redirect()->route('direcciones.listar')
            ->with('success','🗑 Dirección eliminada correctamente');
    }

}
