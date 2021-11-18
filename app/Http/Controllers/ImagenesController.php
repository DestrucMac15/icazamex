<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ImagenesController extends Controller
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
        $tipo = Arr::get($request, 'type', 'images');
        $files = [];

        if($tipo == 'videos'){
            $file = new Multimedia();
            array_set($file, 'nombre', Arr::get($request, 'video.url'));
            array_set($file, 'tipo', $tipo);
            array_set($file, 'titulo', Arr::get($request, 'video.titulo'));
            $file->save();
            array_push($files, [
                'id' => Arr::get($file, 'id'),
                'url' => Arr::get($file, 'nombre'),
                'titulo' => Arr::get($file, 'titulo'),
            ]);

            $data = [
                'idx' => Arr::pluck($files, 'id'),
                'images' => $files
            ];
            return response()->json($data);
        }

        if($request->hasFile('files')){
            $rules = [];

            if($tipo == 'images'){
                foreach($request->file('files') as $index => $value){
                    $rules['files.' . $index] = 'image|mimes:jpeg,jpg,png|max:10000';
                }
            }

            if($tipo == 'files'){
                foreach($request->file('files') as $index => $value){
                    $rules['files.' . $index] = 'required|mimes:pdf|max:10000';
                }
            }

            if(count($rules) > 0){
                $validatedData = $request->validate($rules);
            }


            foreach($request->file('files') as $photo){
                $filepath = $photo->store('public');
                $filename = basename($filepath);

                if(!empty($filename)){
                    $file = new Multimedia();
                    array_set($file, 'nombre', $filename);
                    array_set($file, 'tipo', $tipo);
                    array_set($file, 'titulo', $photo->getClientOriginalName());

                    $file->save();
                    array_push($files, [
                        'id' => Arr::get($file, 'id'),
                        'nombre' => Arr::get($file, 'nombre'),
                        'titulo' => Arr::get($file, 'titulo'),
                        'url' => asset("storage/$filename"),
                    ]);
                }
            }
        }

        $data = [
            'idx' => Arr::pluck($files, 'id'),
            'images' => $files
        ];
        return response()->json($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Multimedia::findOrFail($id);
        $file->delete();
        return response()->json($file);
    }
}
