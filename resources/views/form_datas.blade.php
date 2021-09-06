@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Form Data</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Form Data</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Arrival</th>
                <th scope="col">Departure</th>
                <th scope="col">Passport</th>
                <th scope="col">Accommodation</th>
                <th scope="col">Special Request</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($form_datas as $form_data)
                @php $edit_form_data = route("form_data/show", ["form_data_id" => $form_data->id]) @endphp
                @php $form_data_arrival = route("form_data/arrival/show", ["form_data_id" => $form_data->id]) @endphp
                @php $form_data_departure = route("form_data/departure/show", ["form_data_id" => $form_data->id]) @endphp
                @php $form_data_passport = route("form_data/passport/show", ["form_data_id" => $form_data->id]) @endphp
                @php $form_data_hotel = route("form_data/hotel/show", ["form_data_id" => $form_data->id]) @endphp
                @php $delete_form_data = route("form_data/delete", ["form_data_id" => $form_data->id]) @endphp
                <tr>
                    <td scope="col">{{ $form_data->first_name }}</td>
                    <td scope="col">{{ $form_data->last_name }}</td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $form_data_arrival }}"
                           class="btn btn-success editArrival{{ $form_data->id }}"
                           onclick="open_edit_modal({{ $form_data->id }},'editArrival','arrivalModal')">Arrival</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $form_data_departure }}"
                           class="btn btn-success editDeparture{{ $form_data->id }}"
                           onclick="open_edit_modal({{ $form_data->id }},'editDeparture','departureModal')">Departure</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $form_data_passport }}"
                           class="btn btn-success editPassport{{ $form_data->id }}"
                           onclick="open_edit_modal({{ $form_data->id }},'editPassport','passportModal')">Passport</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $form_data_hotel }}"
                           class="btn btn-success editHotel{{ $form_data->id }}"
                           onclick="open_edit_modal({{ $form_data->id }},'editHotel','hotelModal')">Hotel</a>
                    </td>
                    <td scope="col">{{ $form_data->special_request }}</td>
                    <td scope="col">{{ $form_data->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_form_data }}"
                           class="btn btn-warning editFormData{{ $form_data->id }}"
                           onclick="open_edit_modal({{ $form_data->id }},'editFormData','updateModal')">Modifica</a>

                        <a href="{{ $delete_form_data }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.form_data-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade" id="arrivalModal" tabindex="-1" role="dialog" aria-labelledby="arrivalModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade" id="departureModal" tabindex="-1" role="dialog" aria-labelledby="departureModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade" id="passportModal" tabindex="-1" role="dialog" aria-labelledby="passportModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade" id="hotelModal" tabindex="-1" role="dialog" aria-labelledby="hotelModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection