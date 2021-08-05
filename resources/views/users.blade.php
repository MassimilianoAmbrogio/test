@extends('layouts.app')

@section('content-main')

        <!-- Title -->
        <h1 style="margin-top: 10px; text-align: center;">Users</h1>

        <!-- Button new modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New User</button>
        <a href="http://127.0.0.1:8000/privileges"><button type="button" class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 10px;">Privilege</button></a>
        <a href="http://127.0.0.1:8000/roles"><button type="button" class="btn btn-info" style="float: right; margin-top: 10px; margin-right: 15px;">Role</button></a>
        
        <!-- Table data -->
        <div class="table-responsive">
            <table class="table" style="margin-top: 10px;">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Role</th>
                    <th scope="col">Privilege</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    @php $edit_user = route("user/show", ["user_id" => $user->id]) @endphp
                    @php $user_role = route("user/role/show", ["user_id" => $user->id]) @endphp
                    @php $user_privilege = route("user/privilege/show", ["user_id" => $user->id]) @endphp
                    @php $delete_user = route("user/delete", ["user_id" => $user->id]) @endphp
                    @php
                        $role_name = "";
                        foreach($user->role as $_role){
                            $role_name .= $_role->role->name;
                        }
                    @endphp
                    @php
                        $privilege_name = "";
                        foreach($user->privilege as $_privilege){
                            $privilege_name .= $_privilege->privilege->name;
                        }
                    @endphp
                    <tr>
                        <td scope="col">{{ $user->first_name }}</td>
                        <td scope="col">{{ $user->last_name }}</td>
                        <td scope="col">{{ $user->email }}</td>
                        <td scope="col">{{ $user->active ? "Attivo" : "Non Attivo" }}</td>
                        <td scope="col">{{ $role_name }}</td>
                        <td scope="col">{{ $privilege_name }}</td>
                        <td class="text-right">
                            <a href="javascript:void(0)" 
                                data-href="{{ $edit_user }}" 
                                class="btn btn-warning editUser{{ $user->id }}" 
                                onclick="open_edit_modal({{ $user->id }},'editUser','updateModal')">Modifica</a>

                            <a href="javascript:void(0)" 
                                data-href="{{ $user_role }}" 
                                class="btn btn-info editRole{{ $user->id }}" 
                                onclick="open_edit_modal({{ $user->id }},'editRole','roleModal')">Ruoli</a>

                            <a href="javascript:void(0)"
                               data-href="{{ $user_privilege }}"
                               class="btn btn-success editPrivilege{{ $user->id }}"
                               onclick="open_edit_modal({{ $user->id }},'editPrivilege','privilegeModal')">Privilegi</a>

                            <a href="{{ $delete_user }}" class="btn btn-danger">Elimina</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>

    @include("modals.user-store")

        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"></div>
            </div>
        </div>

        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"></div>
            </div>
        </div>

        <div class="modal fade" id="privilegeModal" tabindex="-1" role="dialog" aria-labelledby="privilegeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"></div>
            </div>
        </div>

@endsection