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
                <th scope="col">Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Number Flight Arrival</th>
                <th scope="col">Airline Arrival</th>
                <th scope="col">Departure City</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Arrival Hour</th>
                <th scope="col">Number Flight Departure</th>
                <th scope="col">Airline Departure</th>
                <th scope="col">Arrival City</th>
                <th scope="col">Departure Date</th>
                <th scope="col">Departure Hour</th>
                <th scope="col">Passport Number</th>
                <th scope="col">Passport Expiry Date</th>
                <th scope="col">Passport Img</th>
                <th scope="col">Hotel</th>
                <th scope="col">Tipology Room</th>
                <th scope="col">Special Request</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($form_datas as $form_data)
                @php $edit_form_data = route("form_data/show", ["form_data_id" => $form_data->id]) @endphp
                @php $delete_form_data = route("form_data/delete", ["form_data_id" => $form_data->id]) @endphp
                <tr>
                    <td scope="col">{{ $form_data->name }}</td>
                    <td scope="col">{{ $form_data->last_name }}</td>
                    <td scope="col">{{ $form_data->number_flight_arrival }}</td>
                    <td scope="col">{{ $form_data->airline_arrival }}</td>
                    <td scope="col">{{ $form_data->departure_city }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($form_data->arrival_date)->format('d/m/Y') }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($form_data->arrival_hour)->format("H:i") }}</td>
                    <td scope="col">{{ $form_data->number_flight_departure }}</td>
                    <td scope="col">{{ $form_data->airline_departure }}</td>
                    <td scope="col">{{ $form_data->arrival_city }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($form_data->departure_date)->format('d/m/Y') }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($form_data->departure_hour)->format("H:i") }}</td>
                    <td scope="col">{{ $form_data->passport_number }}</td>
                    <td scope="col">{{ $form_data->passport_expiry_date }}</td>
                    <td scope="col">{{ basename($form_data->passport_img) }}</td>
                    <td scope="col">{{ $form_data->hotel }}</td>
                    <td scope="col">{{ $form_data->tipology_room }}</td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection