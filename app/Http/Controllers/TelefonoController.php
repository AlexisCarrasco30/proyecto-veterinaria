<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefono;
use App\Models\Persona;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos = Telefono::all();

        return view('telefono.index')->with('telefonos', $telefonos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('telefono.create')->with('persona_id', $id);
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
            'codigoArea' => 'required|numeric|max:9999|min:99',
            'numero'     => 'required|numeric|max:9999999|min:999999',
        ]);

         $telefono = new Telefono();

         $persona = Persona::find($request->get('id'));
         $telefono->codigoArea = $request->codigoArea;
         $telefono->numero     = $request->numero;
         $telefono->persona_id = $request->get('id');
        
         $telefono->save();

         return redirect($request->get('urlAnterior'));
    }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefono = Telefono::find($id);

        return view('telefono.edit')->with('telefono', $telefono);
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
            'codigoArea' => 'required|numeric|max:9999|min:99',
            'numero'     => 'required|numeric|max:9999999|min:999999',
        ]);

        $telefono = Telefono::find($id);

        $telefono->numero     = $request->numero;
        $telefono->codigoArea = $request->codigoArea;
        $telefono->save();


        
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
        $telefono = Telefono::find($id);
        $telefono->delete();

        return redirect($request->get('urlAnterior'));
    }
}
