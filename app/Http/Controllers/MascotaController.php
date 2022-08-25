<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Persona;
use App\Models\HistorialClinico;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascota.index')->with('mascotas', $mascotas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('mascota.create')->with('persona_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota = new Mascota();

        $persona = Persona::find($request->get('id'));

        $mascota->nombre = $request->get('nombre');
        $mascota->raza = $request->get('raza');
        $mascota->especie = $request->get('especie');
        $mascota->sexo = $request->get('sexo');
        $mascota->anioNacimiento = $request->get('anioNacimiento');
        $mascota->persona_id = $request->get('id');
        
        $mascota->save();

        $historialClinico = new HistorialClinico();
        $historialClinico->mascota_id = $mascota->id;

        $historialClinico->save();

        return redirect($request->get('urlAnterior'));

    }
 /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verMascota($id)
    {
        // $mascotas = DB::Table('mascotas') 
        // ->leftJoin('personas', 'mascotas.persona_id', '=', 'personas.id')
        // ->select('mascotas.*','personas.nombre AS nomPerso','personas.apellido AS apePerso')
        // ->where("persona_id",$id)

        // ->get();
        //dd($mascotas);
        $mascotas = Mascota::where('persona_id',$id)->get();

        return view('mascota.index')->with('mascotas', $mascotas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        
        return view('mascota.show')->with('mascota', $mascota);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::find($id);

        return view('mascota.edit')->with('mascota', $mascota);
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
        $mascota = Mascota::find($id);

        $mascota->nombre = $request->get('nombre');
        $mascota->raza = $request->get('raza');
        $mascota->especie = $request->get('especie');
        $mascota->sexo = $request->get('sexo');
        $mascota->anioNacimiento = $request->get('anioNacimiento');
        $mascota->persona_id = $request->get('id');

        $mascota->save();

        $id = $mascota->persona->id;

        return redirect($request->get('urlAnterior'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     *@param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
        return redirect()->route('mascotas.index');
        
    }
    
}
