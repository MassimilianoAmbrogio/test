<form action="{{ route("volunteer/document/update", ["volunteer_document_id" => $volunteer->volunteer_document->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Document Volunteer</h4>
    </div>
    <!-- Document Tipology, Document Type pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="volunteers_document_tipology_id" class="control-label">Document Tipology</label>
                <select class="form-control" name="volunteers_document_tipology_id" id="volunteers_document_tipology_id">
                    <option value="">Select Document Tipology</option>
                    @foreach($documents as $document)
                        <option value="{{ $document->id }}" {{ $document->id == $volunteer->volunteer_document->volunteers_document_tipology_id ? "selected" : "" }}>{{ $document->document_tipology }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="document_type" class="control-label">Document Type</label>
                <input type="file" class="form-control" name="document_type" id="document_type" accept="application/pdf">
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