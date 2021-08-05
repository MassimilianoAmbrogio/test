<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles', [
            'roles' => $roles,
        ]);
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
     * @param  \Illuminate\Http\RoleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $data = $request->only('name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            Role::create($data);
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('roles')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {
        $role = Role::find($role_id);

        return view("role", [
            "role" => $role
        ]);
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
     * @param  \Illuminate\Http\RoleUpdateRequest $request
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $role_id)
    {
        $data = $request->only('name', 'active');

        try {
            Role::find($role_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('roles')->with('success', 'Operazione completata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role_id)
    {
        $role = Role::find($role_id);
        if (empty($role)) {
            return redirect()->route('roles')->with('error', 'Il ruolo non esiste');
        }

        try {
            $role->delete();
        } catch (\Exception $e) {
            return redirect()->route('roles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('roles')->with('success', 'Operazione completata con successo');
    }
}
