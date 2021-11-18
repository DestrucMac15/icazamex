<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Post;
use App\Models\TipoInmueble;
use App\Models\TipoOperacion;

class WebController extends Controller
{
    public function index(){

        $tipoOperacion = TipoOperacion::all();
        $desarrollos = Inmueble::where('inmueble','desarrollos')->orderByRaw('id', 'ASC')->take(10)->with(['estado','municipio','imagenes'])->get();
        
        return view('web.index')->with([
            'tipoOperacion' => $tipoOperacion,
            'desarrollos' => $desarrollos
        ]);
        
    }
    public function inmuebles(Request $resquest){

        //dd($resquest->all(),$resquest->tipo);

        $propiedadesAlternas = Inmueble::where('inmueble',$resquest->inmueble)->orderByRaw('RAND()')->take(10)->with(['estado','municipio','imagenes'])->get();
        //$desarrollosAleatorios = Inmueble::where('inmueble','desarrollos')->orderByRaw('RAND()')->take(10)->with(['estado','municipio','imagenes'])->get();
        $propiedades = Inmueble::with(['estado','municipio','imagenes','tipoOperacion']);

        //Inmueble
        if($resquest->has('inmueble')){
            $propiedades->where('inmueble',$resquest->inmueble);
        }

        $tipoInmueble = null;
        //Tipo de Inmueble
        if($resquest->has('tipo_inmueble_id')){
            if($resquest->tipo_inmueble_id > 0){
                $tipoInmueble = TipoInmueble::find($resquest->tipo_inmueble_id);
                $propiedades->where('tipo_inmueble_id',$resquest->tipo_inmueble_id);
            }
        }

        $estados = null;
        //Estado
        if($resquest->has('estado_id')){
            $estados = Estado::find($resquest->estado_id);
            $propiedades->where('estado_id',$resquest->estado_id);
        }

        $recamaras = null;
         //Recamaras
        if($resquest->has('recamaras')){
            $propiedades->where('recamaras',$resquest->recamaras);
        }

        $propiedades = $propiedades->paginate(10);


        $datos = array(
            'propiedades' => $propiedades,
            'estados' => $estados,
            'tipoInmueble' => $tipoInmueble,
            'resultadosAlternos' => $propiedadesAlternas
        );
        //dd($datos);
        if($resquest->has('inmueble')){
            $datos['tipo'] = $resquest->inmueble;
        }


        return view('web.inmuebles')->with($datos);
    }


    public function propiedadesParticular($propiedad = null){

        $propiedadesAleatorios = Inmueble::where('inmueble','propiedades')->orderByRaw('RAND()')->take(8)->with(['estado','municipio','imagenes'])->get();

        $propiedad = Inmueble::where('id', $propiedad)->with(['servicios','generales','amenidades','exteriores','restricciones','usuario','estado','municipio'])->get();
        
        return view('web.propiedadesParticular')->with([
            'propiedad' => $propiedad[0],
            'propiedadesAleatorios' => $propiedadesAleatorios,
        ]);
    }

    public function desarrollosParticular($desarrollo = null){

        $desarrollosAleatorios = Inmueble::where('inmueble','desarrollos')->orderByRaw('RAND()')->take(8)->with(['estado','municipio','imagenes'])->get();

        $desarrollo = Inmueble::where('id', $desarrollo)->with(['servicios','generales','amenidades','exteriores','restricciones','usuario','estado','municipio','imagenes'])->get();
        
        return view('web.desarrollosParticular')->with([
            'desarrollo' => $desarrollo[0],
            'desarrollosAleatorios' => $desarrollosAleatorios,
        ]);
    }

    public function inversiones(){
        
        $inversiones = Inmueble::where('inmueble','inversiones')->with(['estado','municipio','imagenes'])->get();
        return view('web.inversiones')->with(['inversiones' => $inversiones]);

    }

    public function inversionesParticular($inversion){

        $inversion = Inmueble::where('id', $inversion)->with(['generales','exteriores','restricciones','usuario','estado','municipio','imagenes','inversiones'])->get();
        //dd($inversion);
        return view('web.inversionesParticular')->with(['inversion' => $inversion[0]]);

    }


    public function preguntasFrecuentes(){

        return view('web.preguntasFrecuentes');

    }

    public function contacto(){

        return view('web.contacto');

    }

    public function registro(){

        return view('web.registro');

    }

    public function login(){

        return view('web.login');

    }

    public function terminos(){

        return view('web.terminos');

    }

    public function aviso(){

        return view('web.aviso');

    }

    public function blog(){
        
        $postAleatorios = Post::orderByRaw('RAND()')->take(10)->with(['imagenes'])->get();

        $posts = Post::with(['imagenes'])->paginate(6);
        
        return view('web.blog')->with([
            'postAleatorios' => $postAleatorios,
            'posts' => $posts,
        ]);

    }

    public function blogParticular($slug){

        $post = Post::where('slug',$slug)->with(['imagenes', 'usuarios'])->get();

        //dd($post[0]);

        return view('web.blogParticular')->with([
            'post' => $post
        ]);

    }

    public function promociones(Request $resquest){

        $ofertas = Inmueble::with(['estado','municipio','imagenes']);
        $ofertas->where('oferta',1);
        $ofertas->where('inmueble','propiedades');

        
        $tipoInmueble = null;
        //Tipo de Inmueble
        if($resquest->has('tipo_inmueble_id')){
            $tipoInmueble = TipoInmueble::find($resquest->tipo_inmueble_id);
            $ofertas->where('tipo_inmueble_id',$resquest->tipo_inmueble_id);
        }
        $estados = null;
        //Estado
        if($resquest->has('estado_id')){
            $estados = Estado::find($resquest->estado_id);
            $ofertas->where('estado_id',$resquest->estado_id);
        }


        $ofertas = $ofertas->get();


        $datos = array(
            'ofertas' => $ofertas,
            'estados' => $estados,
            'tipoInmueble' => $tipoInmueble,
        );
        //dd($datos);
        if($resquest->has('inmueble')){
            $datos['tipo'] = $resquest->inmueble;
        }


        return view('web.promociones')->with($datos);

    }
    
}
