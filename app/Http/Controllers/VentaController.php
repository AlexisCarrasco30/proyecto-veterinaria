<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\loteDescripcion;
use App\Models\articulo;
use App\Models\detalleVenta;
use App\Models\notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->vaciarArticulos();
        $ventas = Venta::all();

        return view('venta.index')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $lotes = loteDescripcion::where('unidad','>',0)->get();

        return view('venta.create')->with('lotes', $lotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('hola');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $venta = venta::find($id);
        $detalles = DB::Table('detalle_ventas')
        ->join('lote_descripcions', 'lote_descripcions.id','=','detalle_ventas.idLote')
        ->join('articulos','articulos.id','=','lote_descripcions.articulo_id')
        ->select('detalle_ventas.*','lote_descripcions.vencimiento','articulos.codigo','articulos.descripcion','articulos.marca','articulos.precioVenta',)
        ->where('detalle_ventas.idVenta','=',$id)
        ->get();
        
        return view("venta.show")->with('detalles',$detalles)->with('venta',$venta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = venta::find($id);
        $venta->delete();
        return redirect()->route("ventas.index");
    }



    //A partir de acá son los métodos a implementar

    private function obtenerArticulos()
    {
        $articulos = session("articulos");
        if (!$articulos) {
            $articulos = [];
        }
        return $articulos;
    }

    private function vaciarArticulos()
    {
        $this->guardarArticulos(null);
    }

    private function guardarArticulos($articulos)
    {
        session(["articulos" => $articulos,
        ]);
    }

    public function cancelarVenta()
    {
        $this->vaciarArticulos();
        return redirect()
            ->route("ventas.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quitarArticuloDeVenta(Request $request)
    {   
        $indice = $request->get('articulo');
        $articulos = $this->obtenerArticulos();
        array_splice($articulos, $indice, 1);
        $this->guardarArticulos($articulos);
        return redirect()

            ->route("ventas.create");
    }
    

/********************************************************* */
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function quitarUnArticuloVenta($id)
    {   
        $articulo      =  loteDescripcion::find($id);
        $articulos     =  $this->obtenerArticulos();
        
        $posibleIndice =  $this->buscarIndiceDeArticulo($articulo->id, $articulos);
        $articulos[$posibleIndice]->unidad--;
        
         
        return redirect()
            ->route("ventas.create");
    }


/*********************************** */







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function agregarArticuloVenta($id)
    {
        $articulo = loteDescripcion::find($id);
        if (!$articulo) {
            Session::flash('message','Articulo no existente');
            return redirect()
                ->route("ventas.create");
        }
        $this->agregarArticuloACarrito($articulo);
        return redirect()
            ->route("ventas.create");
    }

private function agregarArticuloACarrito($articulo)
{  
    if ($articulo->unidad <=0) {
        $mensaje='No hay existencias del artículo '. $articulo->articulo->descripcion.' con vencimiento en '. $articulo->vencimiento;
        Session::flash('message',$mensaje);
        return redirect()->route("ventas.create");
    }
    $articulos = $this->obtenerArticulos();
    $posibleIndice = $this->buscarIndiceDeArticulo($articulo->id, $articulos);
    
    // Es decir, producto no fue encontrado
    if ($posibleIndice === -1) {
        $articulo->unidad = 1;
        array_push($articulos, $articulo);
    } else {

        if ($articulos[$posibleIndice]->unidad + 1 > $articulo->unidad) {
            $mensaje="No se pueden agregar más productos de este tipo, se quedarían sin existencia";
            Session::flash('message',$mensaje);
            return redirect()->route("ventas.create");
        }
        $articulos[$posibleIndice]->unidad++;

    }
    $this->guardarArticulos($articulos);
    
    return redirect()->route("ventas.create")->with('$articulos',$articulos);
    
}

private function buscarIndiceDeArticulo(string $id, array &$articulos)
{  
    $indice = 0;

    foreach ($articulos as $unArticulo ) {
        
        if ($unArticulo->id == $id) {
            return $indice;
        }
        $indice++;
    }
    return -1;
}


//terminar venta

public function terminarVenta()
{
    // Crear una venta
    $venta = new Venta();
    $venta->saveOrFail();
    $idVenta = $venta->id;
    $venta->fecha = Carbon::now();
    $articulos = $this->obtenerArticulos();
    $total = 0;
    // Recorrer carrito de compras
    foreach ($articulos as $unArticulo) {
        // El producto que se vende...
        $detalleVenta = new detalleVenta();
        $detalleVenta->idVenta = $idVenta;
        $detalleVenta->cantidad = $unArticulo->unidad;
        $detalleVenta->subtotal = ($unArticulo->unidad)*($unArticulo->articulo->precioVenta);
        $total+= $detalleVenta->subtotal;
        $detalleVenta->idLote = $unArticulo->id;
        // Lo guardamos
        $detalleVenta->saveOrFail();
        // Y restamos la existencia del original
        $loteActualizado = loteDescripcion::find($unArticulo->id);
        $loteActualizado->unidad -= $detalleVenta->cantidad;

        $articuloActualizado = Articulo::find($loteActualizado->articulo_id);
        $articuloActualizado->cantidadTotal -= $detalleVenta->cantidad;
        $articuloActualizado->saveOrFail();

        if($articuloActualizado->cantidadTotal <= $articuloActualizado->minimoStock){
            $notificacion = new notificaciones();
            $notificacion->categoria   = 'articulo';
            $notificacion->descripcion = 'falta de stock del articulo '. $articuloActualizado->descripcion . ', Marca ' . $articuloActualizado->marca ;
            $notificacion->saveOrFail();
           
            if (session()->exists('notificacion')) {
                session()->increment('notificacion', 1);
                
            }
            else{
                session(['notificacion' => 1]);
            }

        }
    
        $loteActualizado->saveOrFail();
        if($loteActualizado->unidad <= 0){
            $loteActualizado->delete();
        }
    }
    $venta->total = $total;
    $venta->saveOrFail();
    $this->vaciarArticulos();
    
    return redirect()->route('ventasTotal', ['id' => $venta->id]);
}

/**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function ventasTotal($id)
      {   
          $venta = Venta::find($id);
 
          
          return view('venta.ventasTotal')->with('venta', $venta);
      }

    /**
    * Display the specified resource.
    *@param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @param  int  $id
    */
    public function confirmarVenta(Request $request, $id)
    {
        $venta = Venta::find($id);
        $venta->tipoPago = $request->get('tipoPago');
        $venta->montoPagado = $request->get('pago');
        $venta->save();
        $ventas = venta::all();
        return redirect('/ventas')->with('ventas', $ventas);
        // return view('venta.index')->with('ventas', $ventas);
    }
}
