@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Accommodation Types</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Tipology Hotels</button>

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
            @foreach($accommodation_types as $accommodation_type)
                @php $edit_accommodation_type = route("accommodation_type/show", ["accommodation_type_id" => $accommodation_type->id]) @endphp
                @php $delete_accommodation_type = route("accommodation_type/delete", ["accommodation_type_id" => $accommodation_type->id]) @endphp
                <tr>
                    <td scope="col">{{ $accommodation_type->name }}</td>
                    <td scope="col">{{ $accommodation_type->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_accommodation_type }}"
                           class="btn btn-warning editAccommodation_type{{ $accommodation_type->id }}"
                           onclick="open_edit_modal({{ $accommodation_type->id }},'editAccommodation_type','updateModal')">Modifica</a>

                        <a href="{{ $delete_accommodation_type }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.accommodation_type-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection