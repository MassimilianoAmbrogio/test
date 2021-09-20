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
                <th scope="col">First Name, Last Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($volunteers as $volunteer)
                @php $edit_volunteer = route("volunteer/show", ["volunteer_id" => $volunteer->id]) @endphp
                @php $edit_volunteer_document = route("volunteer/document/show", ["volunteer_id" => $volunteer->id]) @endphp
                @php $edit_volunteer_feature = route("volunteer/feature/show", ["volunteer_id" => $volunteer->id]) @endphp
                @php $now = \Carbon\Carbon::now() @endphp
                <tr>
                    <td scope="col" rowspan="3" style="line-height: 150px;">{{ $volunteer->nome_completo }}</td>
                    <td scope="col">{{ $volunteer->volunteer_age ? $volunteer->volunteer_age->date_parsed->diff($now)->format('%y years') : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_age ? ($volunteer->volunteer_age->volunteers_age_gender_id > 0 ? $volunteer->volunteer_age->volunteers_age_gender->gender : '-') : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_age ? ($volunteer->volunteer_age->date_parsed->diffInYears($now) >= 18 ? "Si" : "No") : '-' }}</td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer }}"
                           class="btn btn-warning editVolunteer{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteer','updateModal')">Modifica</a>
                    </td>
                    <td scope="col" rowspan="3" style="line-height: 150px;">{{ $volunteer->user->email }}</td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->volunteer_document ? ($volunteer->volunteer_document->volunteers_document_tipology_id > 0 ? $volunteer->volunteer_document->volunteers_document_tipology->document_tipology : '-') : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_document ? $volunteer->volunteer_document->document_type : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_document ? ($volunteer->volunteer_document->document_type == "" ? "No" : "Si" ) : '-' }}</td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer_document }}"
                           class="btn btn-warning editVolunteerDocument{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteerDocument','documentModal')">Modifica</a>
                    </td>
                </tr>
                <tr>
                    <td scope="col">{{ $volunteer->volunteer_feature ? ($volunteer->volunteer_feature->training == true ? "Si" : "No") : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_feature ? ($volunteer->volunteer_feature->volunteers_feature_tipology_id > 0 ? $volunteer->volunteer_feature->volunteers_feature_tipology->feature_tipology : '-') : '-' }}</td>
                    <td scope="col">{{ $volunteer->volunteer_feature ? ($volunteer->volunteer_feature->volunteers_feature_tipology_id == 3 ? "Si" : "No") : '-' }} </td>
                    <td>
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_volunteer_feature }}"
                           class="btn btn-warning editVolunteerFeature{{ $volunteer->id }}"
                           onclick="open_edit_modal({{ $volunteer->id }},'editVolunteerFeature','featureModal')">Modifica</a>
                    </td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection