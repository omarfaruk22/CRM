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
            <form action="{{ route('button.color.update') }}"  method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="col-md-10 mx-4">
                    <br>
                    <label for="submit-button-text" class="form-label">Button Default</label>
                    <input type="text" id="colorInput" wire:model="" name="btn_default" class="jscolor form-control mb-2"
                        value="">
                    <button type="button" class="btn btn-outline-secondary">default</button>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Button Primary</label>
                    <input type="text" id="colorInput" wire:model="color" name="btn_primary"
                        class="jscolor form-control mb-2" value="">
                    <button type="button" class="btn btn-primary">default</button>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Button Info</label>
                    <input type="text" id="colorInput" wire:model="color" name="btn_info"
                        class="jscolor form-control mb-2" value="">
                    <button type="button" class="btn btn-info">default</button>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Button Success</label>
                    <input type="text" id="colorInput" wire:model="color" name="btn_success"
                        class="jscolor form-control mb-2" value="">
                    <button type="button" class="btn btn-success">default</button>
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Button Danger</label>
                    <input type="text" id="colorInput" wire:model="color" name="btn_danger"
                        class="jscolor form-control mb-2" value="">
                    <button type="button" class="btn btn-danger">default</button>
                    <hr>
                </div>
                <br>
                <div class="modal-footer mb-3 mx-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary mx-1">Save</button>
                </div>
            </div>
        </form>
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
