@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Clusters</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Clusters</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clusters as $cluster)
                @php $edit_cluster = route("cluster/show", ["cluster_id" => $cluster->id]) @endphp
                @php $delete_cluster = route("cluster/delete", ["cluster_id" => $cluster->id]) @endphp
                <tr>
                    <td scope="col">{{ $cluster->name }}</td>
                    <td scope="col">{{ $cluster->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_cluster }}"
                           class="btn btn-warning editCluster{{ $cluster->id }}"
                           onclick="open_edit_modal({{ $cluster->id }},'editCluster','updateModal')">Modifica</a>

                        <a href="{{ $delete_cluster }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.cluster-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection
