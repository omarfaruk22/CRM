@extends('backend.layouts.main')
@section('title', 'Send to Mail')
@push('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <div class="card-header">
                <h5>Send contract to email</h5>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Send to</label>
                            <select class="form-select select2" multiple id="select2" data-placeholder="Choose one.........">
                                <option>Select Items</option>
                                <option>Reactive</option>
                                <option>Solution</option>
                                <option>Conglomeration</option>
                                <option>Algorithm</option>
                                <option>Holistic</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cc" class="form-label">CC</label>
                            <input type="text" name="cc" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="mx-1 mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="attach_pdf">
                                <label class="form-check-label" for="attach_pdf">Attach PDF</label>
                            </div>
                            <span>Preview Email Template</span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="taskeditor" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="#" type="button" class="btn btn-primary">Send</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

@push('js')
    {{-- Multiple select  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2').select2({
                theme: 'default', 
            });
            $('#assignee').select2({
                theme: 'default', 
            });
        });
    </script>

    {{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#taskeditor'))
        .catch(error => {
            console.error(error);
        });
	</script>
@endpush
