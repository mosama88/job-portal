
<button type="button" class="btn btn-success mt-2 mx-2" data-toggle="modal" data-target="#modal-lg">
    <i class="fa-solid fa-table mx-1"></i> Import
</button>
{{-- --------------------------------------------- --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.import.excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="model" value="{{ $model }}" hidden>
                    <div class="modal-body py-5">
                        <div>
                            <div class="col-12 d-flex justify-content-center">
                                <img src="{{ asset('dashboard') }}/assets/dist/img/import-file.png"
                                    class="avatar avatar-medium shadow" alt="">
                            </div>


                            <br>
                            <strong class="mb-3">Important Instructions Before Uploading the File:</strong>
                            <div class="col-12">
                                <ul class="text-start">
                                    <li class="mb-2">📄 The Excel file must be in one of the following formats:
                                        <code>.xlsx</code>,
                                        <code>.xls</code>, or <code>.csv</code>.
                                    </li>
                                    <li class="mb-2">✅ Make sure the columns are arranged in the following order:
                                        <strong>{{ $columns }}</strong>.
                                    </li>
                                    <li class="mb-2">📌 The data must start from the first row of the file.</li>
                                    <li class="mb-2">⚠️ Please do not leave any empty rows inside the file.</li>
                                    <li class="mb-2">🔄 Ensure that the file does not contain invalid symbols or
                                        special characters.
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4">
                                <label for="formFile" class="form-label">Import File</label>
                                <input class="form-control  @error('file') is-invalid @enderror" name="file"
                                    type="file" id="formFile" required>
                                @error('file')
                                    <span class="invalid-feedback text-left d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
