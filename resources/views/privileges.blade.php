@extends('layouts.app')

@section('content-main')

        <!-- Title -->
        <h1 style="margin-top: 10px; text-align: center;">Privileges</h1>

        <!-- Button new modal -->
        <a href="http://127.0.0.1:8000/users"><button type="button" class="btn btn-info" style="margin-top: 10px; margin-right: 10px;">Torna alla home</button></a>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New privilege</button>

        <div class="row">
            <div class="col-md-12">
                <h3>Trovati {{ count($privileges) }} Privilegi</h3>
            </div>
        </div>
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
                  @foreach($privileges as $privilege)
                    @php $edit_privilege = route("privilege/show", ["privilege_id" => $privilege->id]) @endphp
                    @php $delete_privilege = route("privilege/delete", ["privilege_id" => $privilege->id]) @endphp
                    <tr>
                        <td scope="col">{{ $privilege->name }}</td>
                        <td scope="col">{{ $privilege->active ? "Attivo" : "Non Attivo" }}</td>
                        <td class="text-right">
                            <a href="javascript:void(0)" 
                                data-href="{{ $edit_privilege }}" 
                                class="btn btn-warning editRole{{ $privilege->id }}" 
                                onclick="open_edit_modal({{ $privilege->id }},'editRole','updateModal')">Modifica</a>
                        </td>
                        <td class="text-right"><a href="{{ $delete_privilege }}" class="btn btn-danger">Elimina</a></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>

    @include("modals.privilege-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection