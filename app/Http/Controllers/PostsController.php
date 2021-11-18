<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidationRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsCollection;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        return view('blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
        $data = $this->data();
        return view('blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidationRequest $request)
    {
        $this->authorize('create', auth()->user());
        $post = $this->createOrUpdate($request);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', auth()->user(), Post::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', auth()->user(), Post::class);
        $data = $this->data($id);
        return view('blog.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidationRequest $request, $id)
    {
        $this->authorize('update', auth()->user(), Post::class);
        $post = $this->createOrUpdate($request, $id);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', auth()->user(), Post::class);
        Post::destroy($id);
    }

    public function createOrUpdate($request, $id = null){
        $post = is_null($id) ? new Post() : Post::findOrFail($id);
        $post = mapModel($post, $request->except(['idx', 'imagenes']));
        $slug = $this->create_slug(Arr::get($request, 'titulo'));
        Arr::set($post, 'slug', $slug);
        $post->save();
        $idx = Arr::get($request, 'idx');
        $post->imagenes()->sync($idx);
        return $post;
    }

    public function data($id = null){
        $post = is_null($id) ? new Post() : Post::findOrFail($id);
        $data = [
            'post' => new PostResource($post),
        ];

        return $data;
    }

    public function table(Request $request){
        $builder = Post::query();
        $search = Arr::get($request, 'search');
        if(!empty($search)){
            $builder->where('titulo', 'like', "%$search%");
        }

        $sort = explode('|', Arr::get($request, 'sort'));
        $field = Arr::get($sort, 0, 'id');
        $order = Arr::get($sort, 1, 'desc');
        $builder->orderBy($field, $order);

        return new PostsCollection($builder->paginate());
    }

    public function create_slug($string){
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        return $slug;
     }
}
