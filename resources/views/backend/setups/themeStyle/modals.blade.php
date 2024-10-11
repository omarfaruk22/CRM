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


        <form action="{{ route('modal.color.update') }}" method="POST">
            @csrf
            <div class="card">
                <div class="col-md-10 mx-4">
                    <br>
                    <label for="submit-button-text" class="form-label">Heading Background</label>
                    <input type="text" id="colorInput" wire:model="" name="head_bg" class="jscolor form-control mb-2"
                        value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Heading Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="head_clr"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Close Button Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="close_btn_clr"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Modal Header Text Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="head_txt_clr"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4 card">
                    <div class="modal-header mx-4 mt-4">
                        <h6 class="" id="exampleModalLabel">New Lead Status</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <small class="mx-4">Sample Text</small>
                    <br>
                    <div class="mx-4 mb-4">
                        Modal Body
                    </div>
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
