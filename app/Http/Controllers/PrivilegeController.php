<?php

namespace App\Http\Controllers;

use App\Privilege;
use App\Http\Requests\PrivilegeStoreRequest;
use App\Http\Requests\PrivilegeUpdateRequest;

use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privileges = Privilege::all();
        return view('privileges', [
            'privileges' => $privileges,
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
     * @param  \Illuminate\Http\PrivilegeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrivilegeStoreRequest $request)
    {
        $data = $request->only('name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            Privilege::create($data);
        } catch (\Exception $e) {
            return redirect()->route('privileges')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('privileges')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $privilege_id
     * @return \Illuminate\Http\Response
     */
    public function show($privilege_id)
    {
        $privilege = Privilege::find($privilege_id);

        return view("privilege", [
            "privilege" => $privilege
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
     * @param  \Illuminate\Http\PrivilegeUpdateRequest $request
     * @param  int  $privilege_id
     * @return \Illuminate\Http\Response
     */
    public function update(PrivilegeUpdateRequest $request, $privilege_id)
    {
        $data = $request->only('name', 'active');

        try {
            Privilege::find($privilege_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('privileges')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('privileges')->with('success', 'Operazione completata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $privilege_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($privilege_id)
    {
        $privilege = Privilege::find($privilege_id);
        if (empty($privilege)) {
            return redirect()->route('privileges')->with('error', 'Il privilegio non esiste');
        }

        try {
            $privilege->delete();
        } catch (\Exception $e) {
            return redirect()->route('privileges')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('privileges')->with('success', 'Operazione completata con successo');
    }
}
