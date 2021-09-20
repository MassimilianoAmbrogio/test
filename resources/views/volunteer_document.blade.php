<form action="{{ route("volunteer/document/update", ["volunteer_id" => $volunteer->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Document Volunteer</h4>
    </div>
    <!-- Document Tipology, Document Type pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="document_tipology" class="control-label">Document Tipology</label>
                <select class="form-control" name="document_tipology" id="document_tipology">
                    <option value="">Select Document Tipology</option>
                    <option value="1" {{ $volunteer->volunteer_document->document_tipology == 1 ? "selected" : "" }}>Passport</option>
                    <option value="2" {{ $volunteer->volunteer_document->document_tipology == 2 ? "selected" : "" }}>Card Identity</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="document_type" class="control-label">Document Type</label>
                <input type="file" class="form-control" name="document_type" id="document_type" accept="application/pdf" required>
                <a href="{{ $volunteer->volunteer_document->document_type }}" target="_blank">{{ basename($volunteer->volunteer_document->document_type) }}</a>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>