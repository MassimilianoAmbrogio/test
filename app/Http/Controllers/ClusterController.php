<?php

namespace App\Http\Controllers;

use App\ArrCluster;
use App\Accommodation;
use App\Cluster;
use App\Http\Requests\ClusterStoreRequest;
use App\Http\Requests\ClusterUpdateRequest;
use App\Http\Requests\ArrClusterStoreRequest;

use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function index()
    {
        $arrays = ArrCluster::all();
        $clusters = Cluster::all();
        return view('clusters', [
            'clusters' => $clusters,
            'arrays' => $arrays,
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
     * @param  \Illuminate\Http\RoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClusterStoreRequest $request, ArrClusterStoreRequest $request)
    {
        $data = $request->only(  'name', 'active');
        $data2 = $request->only( 'last_name', 'name', 'active', 'age', 'city');

        $data["slug"] = str_slug($data["name"]);
        $data2["slug"] = str_slug($data["name"]);

        try {
            Cluster::create($data);
            ArrCluster::create($data2);
        } catch (\Exception $e) {
            return redirect()->route('clusters')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('clusters')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $clusters_id
     * @return \Illuminate\Http\Response
     */
    public function show($clusters_id)
    {
        $cluster = Cluster::find($clusters_id);
        return view("cluster", [
            "cluster" => $cluster,
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
