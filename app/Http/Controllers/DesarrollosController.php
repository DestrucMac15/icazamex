<?php

namespace App\Http\Controllers;

use App\Http\Caracteristicas;
use App\Http\Requests\DesarrolloValidationRequest;
use App\Http\Resources\InmuebleResource;
use App\Http\Resources\InmueblesCollection;
use App\Http\Resources\InversionResource;
use App\Models\Inmueble;
use App\Models\Inversion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DesarrollosController extends Controller
{
    private $tipo = 'desarrollos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmuebles.index', [
            'tipo' => $this->tipo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->data();
        return view('inmuebles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesarrolloValidationRequest $request)
    {
        $inmueble = $this->createOrUpdate($request);
        return new InmuebleResource($inmueble);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->data($id);
        return view('inmuebles.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesarrolloValidationRequest $request, $id)
    {
        $inmueble = $this->createOrUpdate($request, $id);
        return new InmuebleResource($inmueble);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inmueble::destroy($id);
    }

    public function data($id = null){
        $inmueble = is_null($id) ? new Inmueble() : Inmueble::findOrFail($id);
        $data = [
            'inmueble' => new InmuebleResource($inmueble),
            'tipo' => $this->tipo,
            'caracteristicas' => Caracteristicas::desarrollos(),
            'inversion' => new InversionResource(new Inversion()),
        ];

        return $data;
    }

    public function createOrUpdate($request, $id = null){
        $inmueble = is_null($id) ? new Inmueble() : Inmueble::findOrFail($id);
        $inmueble = mapModel($inmueble, $request->except(['servicios', 'generales', 'exteriores', 'amenidades', 'restricciones', 'antiguedad_fecha']));
        $antiguedad_mes = Arr::get($request, 'antiguedad_mes');
        $antiguedad_anio = Arr::get($request, 'antiguedad_anio');
        Arr::set($inmueble, 'antiguedad', implode('/', [$antiguedad_mes, $antiguedad_anio]));
        $inmueble->save();

        $servicios = Arr::get($request, 'servicios');
        $generales = Arr::get($request, 'generales');
        $exteriores = Arr::get($request, 'exteriores');
        $amenidades = Arr::get($request, 'amenidades');
        $restricciones = Arr::get($request, 'restricciones');

        $inmueble->servicios()->sync($servicios);
        $inmueble->generales()->sync($generales);
        $inmueble->exteriores()->sync($exteriores);
        $inmueble->amenidades()->sync($amenidades);
        $inmueble->restricciones()->sync($restricciones);

        $imgidx = Arr::get($request, 'imgidx');
        $fileidx = Arr::get($request, 'fileidx');
        $videoidx= Arr::get($request, 'videoidx');

        $idx = array_merge($imgidx, $fileidx, $videoidx);
        $inmueble->imagenes()->sync($idx);

        return $inmueble;
    }

    public function table(Request $request){
        $inmueble = Arr::get($request, 'tipo', $this->tipo);
        $builder = Inmueble::where('inmueble', $inmueble);
        $search = Arr::get($request, 'search');
        if(!empty($search)){
            $builder->where('titulo', 'like', "%$search%");
        }

        $sort = explode('|', Arr::get($request, 'sort'));
        $field = Arr::get($sort, 0, 'id');
        $order = Arr::get($sort, 1, 'desc');
        $builder->orderBy($field, $order);

        return new InmueblesCollection($builder->paginate());
    }
}
