<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//traer de shinobi
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;


class RoleController extends Controller
{
    public function __construct()
    {
        //crear
        $this->middleware('can:roles.create')->only(['create','store']);
        //ver el listado
        $this->middleware('can:roles.index')->only(['index']);;
        //editar
        $this->middleware('can:roles.edit')->only(['edit','update']);;
        //mostrar
        $this->middleware('can:roles.show')->only(['show']);;
        //eliminar    
        $this->middleware('can:roles.destroy')->only(['destroy']);;     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
        ->with('info', 'Rol guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //traemos los roles
        $permissions = Permission::get();
        return view('roles.edit', compact('role','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //primero actualizar el role
        //luego actualizar los roles        

        //actualiza el role
        $role->update($request->all());

        //actualizar permiso
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
        ->with('info', 'Rol  actualizado con exito');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
