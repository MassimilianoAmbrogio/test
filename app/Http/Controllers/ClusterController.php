<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\Cluster;
use App\Http\Requests\ClusterStoreRequest;
use App\Http\Requests\ClusterUpdateRequest;

use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function index()
    {
        $clusters = Cluster::all();
        return view('clusters', [
            'clusters' => $clusters,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ClusterStoreRequest $request)
    {
        $data = $request->only(  'name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            Cluster::create($data);
        } catch (\Exception $e) {
            return redirect()->route('clusters')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('clusters')->with('success', 'Operazione completata con successo');
    }

    public function show($clusters_id)
    {
        $cluster = Cluster::find($clusters_id);
        return view("cluster", [
            "cluster" => $cluster,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ClusterUpdateRequest $request, $cluster_id)
    {
        $data = $request->only('name', 'active');

        try {
            Cluster::find($cluster_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('clusters')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('clusters')->with('success', 'Operazione completata con successo');
    }

    public function destroy($cluster_id)
    {
        $cluster = Cluster::find($cluster_id);
        if (empty($cluster)) {
            return redirect()->route('clusters')->with('error', ' Cluster non esiste');
        }

        $accommodation = Accommodation::where('cluster_id', $cluster_id)->count();
        if ($accommodation) {
            return redirect()->route('clusters')->with('error', 'Non è possibile cancellare la riga perchè il Name è inserito in una accommodation');
        }

        try {
            $cluster->delete();
        } catch (\Exception $e) {
            return redirect()->route('clusters')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('clusters')->with('success', 'Operazione completata con successo');
    }
}