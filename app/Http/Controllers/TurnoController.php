<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Telefono;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTurno()
    {
        return view('turnos');
    }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $turnos = DB::Table('turnos')
                  ->leftJoin('personas', 'turnos.persona_id', '=', 'personas.id')
                  ->select('turnos.*','personas.id as personaId','personas.nombre','personas.apellido','personas.dni')
                  ->get();
        $tel =DB::Table('telefonos')
                  ->leftJoin('personas', 'telefonos.persona_id', '=', 'personas.id')
                  ->select('telefonos.*','personas.id as personaId','telefonos.numero')
                  ->get();

         return view('turno.index')->with('turnos', $turnos)->with('tel',$tel);

     }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response  
      */
    public function create()
    {
        return view('turno.create');
    }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
        
        $to_time   = strtotime($request->hasta);
        $from_time = strtotime($request->desde);
        $minutes   = round(abs($to_time - $from_time) / 60);
        $minutes   = intval($minutes);
        $cantidad  = ($minutes + $request->descanso)/($request->descanso + $request->duracion);
        $cantidad  = intval($cantidad);
        $time = new Carbon($request->get('fecha').' '.$request->get('desde'));
        $duracion  = intval($request->duracion);
        $descanso  = intval($request->descanso);
        for($i=0; $i<$cantidad ; $i++){
            $turno = new Turno();
            $turno->start = $time->format('Y-m-d H:i:s');//8:00
            $time->addMinutes($duracion);
            $turno->end = $time->format('Y-m-d H:i:s');//8:30
            $turno->title='veterinario';
            $turno->tipo = 'v';
            $turno->estado = 0;
            $time->addMinutes($descanso); //8:40
            $turno->save();
        }


     /*     $turno->fecha = $request->get('fecha');
         $turno->hora = $request->get('hora'); */
         


        /*  dd($request->get('fecha'));  */
     
         $turno->save();
       

         return redirect('/turnos');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $turno = Turno::find($id);

         
         return view('turno.show')->with('turno', $turno);
     }



        /**
     * Store a newly 
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function mostrarTurno(Request  $request)
    {
       $turno = DB::table('turnos')
                ->where('tipo',$request->id)
                ->where('estado',0)
                ->get();
     
        return response(json_encode($turno),200)->header('Content-type','text/plain');
                
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    { 
        if(strstr($request->asunto,'http') or (is_file($request->asunto))){
            return redirect('/seleccionTurno');
        }
        
        
        $request->validate([
            'nombre'     => 'required| string',
            'apellido'   => 'required| string',
            'dni'        => 'required|integer|max:100000000|min:1000000',
            'codigoArea' => 'required|numeric|max:9999|min:99',
            'telefono'   => 'required|numeric|max:9999999|min:999999',
            'idTurno'    => 'required|integer|',
            'asunto'     => 'nullable|string|regex:/^[\pL\s\-]+$/u',
        ]);
        

        

        
         $persona = DB::table('personas')
         ->where('dni',$request->get('dni'))
         ->get();
         
         if($persona->isEmpty()){
            
            $persona = new Persona();
            $persona->nombre = $request->get('nombre');
            $persona->apellido = $request->get('apellido');
            $persona->dni = $request->get('dni');
            $persona->direccion = "agregar_dirección";  
            $persona->save();
            
            $telefono = new Telefono();
          
            $telefono->codigoArea = $request->get('codigoArea');
            $telefono->numero     = $request->get('telefono');
            $telefono->persona_id = $persona->id;
            $telefono->save();
            
            $turnoAux = Turno::find($request->get('idTurno'));
            $turnoAux->estado = 1;
            $turnoAux->persona_id = $persona->id;
            $turnoAux->asunto = $request->get('asunto');
        

            $turnoAux->save();
        

            return redirect('/seleccionTurno');
           /*  return redirect('/turnos'); */
         }

            $telefono = new Telefono();
            $telefono->codigoArea = $request->get('codigoArea');
            $telefono->numero     = $request->get('telefono'); 
            $telefono->persona_id = $persona[0]->id;
            $telefono->save();
           
         

         $turnoAux = Turno::find($request->get('idTurno'));
         $turnoAux->estado = 1;
         $turnoAux->persona_id = $persona[0]->id;
         $turnoAux->asunto = $request->get('asunto');
        

         $turnoAux->save();
         

         //DB::table('turnos') ->insert(['id'=>$turno->id,'title'=>$turno->title,'start'=>$turno->start,'end'=>$turno->end,'tipo'=>$turno->tipo,'estado'=>$turno->estado,'idpersona'=>$turno->idPersona,]);
         
         return redirect('/seleccionTurno');

      /*    return redirect('/turnos'); */
    }


     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $turno = Turno::find($id);
         $array = explode(' ', $turno->start); 
         $fecha = $array[0];
         $hora = $array[1]; 
         return view('turno.edit')->with('turno', $turno)->with('fecha', $fecha)->with('hora', $hora);




     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function cancelar($id)
      {
          $turno = Turno::find($id);
          
          $turno->estado = 0;
          $turno->persona_id = NULL;
          

          $turno->save();

          return redirect('/turnos');

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
         $turno = Turno::find($id);
         
      
         //acá iría el input de la persona traído del formulario del calendario
         $turno->start = $request->get('fecha').' '.$request->get('hora');
         $turno->end = $request->get('fecha').' '.$request->get('hora');
         $turno->tipo='v';
         $turno->title="veterinario";
         $turno->estado=0; 

       
        
         $turno->save();

         return redirect('/turnos');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $turno = Turno::find($id);
         $turno->delete();

         return redirect('/turnos');
     }

  /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function mensaje($id)
      {
          $turno = Turno::find($id);
          $persona = $turno->persona; 
        /*   dd($persona->telefonos[0]->numero); */
        $array = explode(' ', $turno->start); 
        $fecha = $array[0];
        $hora = $array[1]; 

          return view('turno.mensaje')->with('turno', $turno)->with('persona',$persona)->with('fecha',$fecha)->with('hora',$hora);
      }




}
