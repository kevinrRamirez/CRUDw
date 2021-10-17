<?php

namespace App\Http\Controllers;

use App\Estudiantes;
use Illuminate\Http\Request;
use App;
use App\Grupos;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupo = App\Grupos::select('grupo')->get();
        $estud = App\Estudiantes::paginate(5);
        return view('viewestudiantes', compact('estud','grupo'));
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
        
        $estAgregar = new Estudiantes;
        $request->validate([
            'nombre' => 'required',
            'apellidos'=>'required',
            'edad'=>'required',
            'email'=>'required',
            'telefono'=>'required',
            'grupo'=>'required',
        ]);
        $estAgregar->nombre = $request->nombre;
        $estAgregar->apellidos = $request->apellidos;
        $estAgregar->edad = $request->edad;
        $estAgregar->email = $request->email;
        $estAgregar->telefono = $request->telefono;
        $estAgregar->grupo = $request->grupo;
        $estAgregar->save();
        return back()->with('agregarest', 'Se Agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = App\Grupos::select('grupo')->get();
        $estuActualizar = App\Estudiantes::findOrFail($id);
        return view('editarest', compact('estuActualizar','grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $estUpdate = App\Estudiantes::findOrFail($id);
            $estUpdate->nombre = $request->nombre;
            $estUpdate->apellidos = $request->apellidos;
            $estUpdate->edad = $request->edad;
            $estUpdate->email = $request->email;
            $estUpdate->telefono = $request->telefono;
            $estUpdate->grupo = $request->grupo;
            $estUpdate->save();
            return back()->with('updateest','El Grupo se Actualizo');
        } catch (\Throwable $th) {
            return back()->with('updateest','verifique datos ');
        }
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estDelete = App\Estudiantes::findOrFail($id);
        $estDelete ->delete();
        return back()->with('eliminarest', 'Se elimino');
    }
}
