@extends('backend.layouts.main')
@section('title', 'Theme Style')
@section('content')

    @push('css')
        {{-- Text editor  --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @endpush

    <div class="row">
        <div class="col-md-3 mb-3">
            {{-- Sideber --}}
            @include('backend.setups.themeStyle.sidebar');
            {{-- end sideber --}}
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="col-md-10 mx-4">
                    <br>
                    <label for="submit-button-text" class="form-label"><span><a href="">Links</a></span> Color
                        (href)</label>
                    <input type="text" id="colorInput" wire:model="" name="color1" class="jscolor form-control mb-2"
                        value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Links Hover/Focus Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color2"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Table Headings Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color3"
                        class="jscolor form-control mb-2" value="">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Example Heading 1</th>
                                <th>Example Heading 2</th>
                            </tr>
                        </thead>
                    </table>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Items Table Headings Background Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color4"
                        class="jscolor form-control mb-2" value="">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Example Heading 1</th>
                                <th>Example Heading 2</th>
                            </tr>
                        </thead>
                    </table>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Items Table Headings Text Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color5"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Admin Login Background</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Text Muted</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <small>Example <span class="text-muted">Text Muted</span></small>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Text Danger</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <small>Example <span class="text-danger">Text Danger</span></small>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Text Warning</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <small>Example <span class="text-warning">Text Warning</span></small>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Text Info</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <small>Example <span class="text-info">Text Info</span></small>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Text Success</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
                    <small>Example <span class="text-success">Text Success</span> </small>
                    <hr>
                </div>

                <br>
                <div class="modal-footer mb-3 mx-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary mx-1">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- text editor  --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


    {{-- color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("colorInput");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>
    {{-- color picker end  --}}
@endpush
