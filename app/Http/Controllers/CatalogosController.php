<?php

namespace App\Http\Controllers;

use App\Models\Amenidad;
use App\Models\Antiguedad;
use App\Models\Country;
use App\Models\Estado;
use App\Models\EstadoConservacion;
use App\Models\Exterior;
use App\Models\FormaEntrega;
use App\Models\FormaTerreno;
use App\Models\General;
use App\Models\Localidad;
use App\Models\Municipio;
use App\Models\Restriccion;
use App\Models\Servicio;
use App\Models\Tipo;
use App\Models\TipoInmueble;
use App\Models\TipoOperacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CatalogosController extends Controller
{
    public function estados(Request $request){
        $estados = Estado::all();
        return response()->json($estados);
    }

    public function municipios(Request $request){
        $estado_id = Arr::get($request, 'estado_id');
        $municipios = Municipio::where('estado_id', $estado_id)->get();
        return response()->json($municipios);
    }

    public function localidades(Request $request){
        $municipio_id = Arr::get($request, 'municipio_id');
        $localidades = Localidad::where('municipio_id', $municipio_id)->orderBy('nombre')->get();
        return response()->json($localidades);
    }

    public function tipos(Request $request){
        $tipos = Tipo::all();
        return response()->json($tipos);
    }

    public function todos(Request $request){
        $tipo = Arr::get($request, 'type', 'propiedades');

        $data = [
            'tipo_operacion' => TipoOperacion::where('tipo', $tipo)->get(),
            'paises' => Country::whereIn('id', [484])->get(),
            'estados' => Estado::whereIn('id', [9, 22, 23])->get(),
            'tipo_inmueble' => TipoInmueble::whereNull('deleted_at')->get(),
            'estado_conservacion' => EstadoConservacion::all(),
            'servicios' => Servicio::all(),
            'generales' => General::all(),
            'exteriores' => Exterior::all(),
            'amenidades' => Amenidad::all(),
            'restricciones' => Restriccion::all(),
            'formas_entrega' => FormaEntrega::all(),
            'formas_terreno' => FormaTerreno::all(),
            'antiguedad' => Antiguedad::all(),
            'asesores' => User::whereHas('roles', function($q){
                $q->where('slug', 'user');
            })->get(),
        ];

        return response()->json($data);
    }
}
