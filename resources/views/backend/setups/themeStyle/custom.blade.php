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
                    <label for="input11" class="form-label">
                        <i class="fadeIn animated bx bx-message-x" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Custom CSS to use in both admin and customers area"></i> Customers and Admin Area</label>
                    <textarea class="form-control" id="input11" placeholder="" rows="8"></textarea>
                </div>
                <div class="col-md-10 mx-4">
                    <br>
                    <label for="input11" class="form-label">Admin Area</label>
                    <textarea class="form-control" id="input11" placeholder="" rows="8"></textarea>
                </div>
                <div class="col-md-10 mx-4">
                    <br>
                    <label for="input11" class="form-label">Customers Area</label>
                    <textarea class="form-control" id="input11" placeholder="" rows="8"></textarea>
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
