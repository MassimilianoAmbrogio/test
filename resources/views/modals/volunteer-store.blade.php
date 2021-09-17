<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('volunteer/store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserisci Volunteer</h4>
                </div>
                <!-- First Name, Last Name, Document Tipology, Document Type, Feature Tipology, Training -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="first_name" class="control-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date_of_birth" class="control-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="gender" class="control-label">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">Select Gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="document_tipology" class="control-label">Document Tipology</label>
                            <select class="form-control" name="document_tipology" id="document_tipology">
                                <option value="">Select Document Tipology</option>
                                @foreach($document_tipologys as $document_tipology)
                                    <option value="{{ $document_tipology->id }}">{{ $document_tipology->document_tipology }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="document_type" class="control-label">Document Type</label>
                            <input type="file" class="form-control" name="document_type" id="document_type" accept="application/pdf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="feature_tipology" class="control-label">Feature Tipology</label>
                            <select class="form-control" name="feature_tipology" id="feature_tipology">
                                <option value="">Select Feature Tipology</option>
                                <option value="1">Arrival Area</option>
                                <option value="2">Hotel Area</option>
                                <option value="3">Competition Area</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" style="margin-top: 34px;">
                            <label class="form-check-label" for="training">Training</label>
                            <input class="form-check-input" type="checkbox" name="training" id="training">
                        </div>
                    </div>
                </div>
                <!-- Bottons submit and close -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>