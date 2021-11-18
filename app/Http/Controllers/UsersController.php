<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $data = [
            'user' => new UserResource(new User()),
        ];
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', auth()->user());
        return $this->createOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', auth()->user(), User::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', auth()->user(), User::class);
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
        $this->authorize('update', auth()->user(), User::class);
        return $this->createOrUpdate($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', auth()->user(), User::class);
        $user = User::findOrFail($id);
        $user->delete();
        return new UserResource($user);
    }

    public function createOrUpdate($request, $id = null){
        $user = is_null($id) ? new User() : User::findOrFail($id);
        $update_password = Arr::get($request, 'update_password', false);
        Arr::set($user, 'name', Arr::get($request, 'user.name'));
        Arr::set($user, 'email', Arr::get($request, 'user.email'));
        if(is_null($id) || $update_password){
            Arr::set($user, 'password', Hash::make(Arr::get($request, 'user.password')));
        }
        $user->save();

        $role_id = Arr::get($request, 'user.role_id');
        $user->roles()->sync($role_id);

        return new UserResource($user);
    }

    public function table(Request $request){
        $builder = User::query();
        $search = Arr::get($request, 'search');
        if(!empty($search)){
            $builder->where('titulo', 'like', "%$search%");
        }

        $sort = explode('|', Arr::get($request, 'sort'));
        $field = Arr::get($sort, 0, 'id');
        $order = Arr::get($sort, 1, 'desc');
        $builder->orderBy($field, $order);

        return new UsersCollection($builder->paginate());
    }

    public function permissions(){
        $data = [
            'is_admin' => auth()->user()->hasRole('admin'),
        ];

        return response()->json($data);
    }

    public function asesores(){
        $data = [
            'is_admin' => auth()->user()->hasRole('admin'),
        ];

        return response()->json($data);
    }
}
