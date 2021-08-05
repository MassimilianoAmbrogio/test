@extends('layouts.app')

@section('content-main')

        <!-- Title -->
        <h1 style="margin-top: 10px; text-align: center;">Roles</h1>

        <!-- Button new modal -->
        <a href="http://127.0.0.1:8000/users"><button type="button" class="btn btn-info" style="margin-top: 10px; margin-right: 10px;">Torna alla home</button></a>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New role</button>
        
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
                  @foreach($roles as $role)
                    @php $edit_role = route("role/show", ["role_id" => $role->id]) @endphp
                    @php $delete_role = route("role/delete", ["role_id" => $role->id]) @endphp
                    <tr>
                        <td scope="col">{{ $role->name }}</td>
                        <td scope="col">{{ $role->active ? "Attivo" : "Non Attivo" }}</td>
                        <td class="text-right">
                            <a href="javascript:void(0)" 
                                data-href="{{ $edit_role }}" 
                                class="btn btn-warning editRole{{ $role->id }}" 
                                onclick="open_edit_modal({{ $role->id }},'editRole','updateModal')">Modifica</a>
                        </td>
                        <td class="text-right"><a href="{{ $delete_role }}" class="btn btn-danger">Elimina</a></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>

    @include("modals.role-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection
