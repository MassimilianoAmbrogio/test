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
                @php $edit_volunteer_document = route("volunteer/document/show", ["volunteer_id" => $volunteer->id]) @endphp
                @php $edit_volunteer_feature = route("volunteer/feature/show", ["volunteer_id" => $volunteer->id]) @endphp

                <tr>
                    <td scope="col" rowspan="3">{{ $volunteer->first_name }} {{ $volunteer->last_name }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($volunteer->date_of_birth)->diffInYears() }}</td>
                    <td scope="col">{{ $volunteer->gender }}</td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->document_tipology }}</td>
                    <td scope="col">{{ basename($volunteer->document_type) }}</td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->feature_tipology }}</td>
                    <td scope="col">{{ $volunteer->training ? "No" : "Si" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer }}"
                           class="btn btn-warning editVolunteer{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteer','updateModal')">Modifica</a>
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer_document }}"
                           class="btn btn-warning editVolunteerDocument{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteerDocument','documentModal')">Modifica</a>
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer_feature }}"
                           class="btn btn-warning editVolunteerFeature{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteerFeature','featureModal')">Modifica</a>
                    </td>
                    <td scope="col" rowspan="3">{{ $volunteer->user->email }}</td>
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

    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content"></div>
        </div>
    </div>

    <div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection