<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Telefono;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index')->with('personas', $personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     $request->validate([
        'nombre'     => 'required| string',
        'apellido'   => 'required| string',
        'dni'        => 'required|integer|max:100000000|min:1000000',
        'direccion'  => 'required|string|max:256| min:4',
        'codigoArea' => 'required|numeric|max:9999|min:99',
        'numero'     => 'required|numeric|max:9999999|min:999999',  
    ]);

        $persona = new Persona();

        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->dni = $request->get('dni');
        $persona->direccion = $request->get('direccion');
        
        $persona->save();
       
        $telefono = new Telefono();
        $telefono->numero     = $request->numero;
        $telefono->codigoArea = $request->codigoArea;
        $telefono->persona_id = $persona->id;

        $telefono->save();

        return redirect('/personas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        //$telefonos = DB::table('telefonos')->where('persona_id',$id)->get();
        
        return view('persona.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('persona.edit')->with('persona', $persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'     => 'required| string',
            'apellido'   => 'required| string',
            'dni'        => 'required|integer|max:100000000|min:1000000',
            'direccion'  => 'required|string|max:256| min:4',
              
        ]);

        $persona = Persona::find($id);

        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->dni = $request->get('dni');
        $persona->direccion = $request->get('direccion');
        $persona->telefonos($request->get('telefono'));
        
        $persona->save();

        return redirect('/personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        return redirect('/personas');
    }
}
