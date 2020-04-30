<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//traer de shinobi
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;


class RoleController extends Controller
{
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
        return view('roles.create');
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
        $role = role::create($request->all());
        return redirect()->route('roles.edit',$role->id)
        ->with('info', 'roleo guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        return view('roles.show', compact('role'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //traemos los roles
        $roles = Role::get();
        return view('roles.edit', compact('role','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        //primero actualizar el usuario
        //luego actualizar los roles        

        //actualiza el usuario
        $role->update($request->all());

        //actualizar roles
        $role->roles()->sync($request->get('roles'));

        return redirect()->route('roles.edit',$role->id)
        ->with('info', 'Usuario actualizado con exito');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        //
        $role->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
