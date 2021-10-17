<?php

namespace App\Http\Controllers;

use App\Grupos;
use Illuminate\Http\Request;
use App;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = App\Grupos::paginate(5);
        return view('inicio',compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupoAgregar = new Grupos;
        $request->validate([
            'semestre' => 'required',
            'turno'=>'required',
            'grupo'=>'required',
        ]);
        $grupoAgregar->semestre = $request->semestre;
        $grupoAgregar->turno = $request->turno;
        $grupoAgregar->grupo = $request->grupo;
        $grupoAgregar->save();
        return back()->with('agregar', 'Se Agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(Grupos $grupos)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupoActualizar = App\Grupos::findOrFail($id);
        return view('editar', compact('grupoActualizar'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $grupoUpdate = App\Grupos::findOrFail($id);
        $grupoUpdate->semestre = $request->semestre;
        $grupoUpdate->turno = $request->turno;
        $grupoUpdate->grupo = $request->grupo;
        $grupoUpdate->save();
        return back()->with('update','El Grupo se Actualizo');
        } catch (\Throwable $th) {
            return back()->with('update','El Grupo No se pudo Actualizar \n verifique datos');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupoDelete = App\Grupos::findOrFail($id);
        $grupoDelete ->delete();
        return back()->with('eliminar', 'Se elimino');
    }
}
