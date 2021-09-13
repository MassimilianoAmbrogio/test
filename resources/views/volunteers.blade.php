@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Volunteers</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Volunteers</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">First Name / Last Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Document Tipology</th>
                <th scope="col">Document Type</th>
                <th scope="col">Feature Tipology</th>
                <th scope="col">Training</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($volunteers as $volunteer)
                @php $edit_volunteer = route("volunteer/show", ["volunteer_id" => $volunteer->id]) @endphp
                <tr>
                    <td scope="col" rowspan="2">{{ $volunteer->first_name }} {{ $volunteer->last_name }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($volunteer->date_of_birth)->format('d/m/Y') }}</td>
                    <td scope="col">{{ $volunteer->gender }}</td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->document_tipology }}</td>
                    <td scope="col">{{ $volunteer->document_type }}</td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->feature_tipology }}</td>
                    <td scope="col">{{ $volunteer->training ? "No" : "Si" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer }}"
                           class="btn btn-warning editVolunteer{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteer','updateModal')">Modifica</a>
                    </td>
                    <td scope="col" rowspan="2">{{ $volunteer->user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.volunteer-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection