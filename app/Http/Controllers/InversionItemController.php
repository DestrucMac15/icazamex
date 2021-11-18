<?php

namespace App\Http\Controllers;

use App\Http\Resources\InversionesCollection;
use App\Http\Resources\InversionResource;
use App\Models\Inversion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InversionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inversion = $this->createOrUpdate($request);
        return new InversionResource($inversion);
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
        //
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
        $inversion = $this->createOrUpdate($request, $id);
        return new InversionResource($inversion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inversion::destroy($id);
    }

    public function createOrUpdate($request, $id = null){
        $inversion = is_null($id) ? new Inversion() : Inversion::findOrFail($id);
        $inversion = mapModel($inversion, $request->all());
        $inversion->save();
        return $inversion;
    }

    public function table(Request $request){
        $builder = Inversion::query();
        $search = Arr::get($request, 'search');
        if(!empty($search)){
            dd($search);
            $builder->where('titulo', 'like', "%$search%");
        }

        $sort = explode('|', Arr::get($request, 'sort'));
        $field = Arr::get($sort, 0, 'id');
        $order = Arr::get($sort, 1, 'desc');
        $builder->orderBy($field, $order);

        return new InversionesCollection($builder->paginate());
    }
}
