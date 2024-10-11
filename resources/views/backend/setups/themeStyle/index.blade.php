@extends('backend.layouts.main')
@section('title', 'Theme Style')
@section('content')

    @push('css')
        {{-- Text editor  --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @endpush

    {{-- <livewire:backend.setups.theme.theme-style-liveware/> --}}

    <div>
        @if(isset(themecolor()->sidebar_color))

        <div class="row">
            <div class="col-md-3 mb-3">
                {{-- Sideber --}}
                @include('backend.setups.themeStyle.sidebar');
                {{-- end sideber --}}
            </div>
            <div class="col-md-9">
                <form action="{{ route('sidebar.color.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="col-md-10 mx-4">
                        <br>

                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Background Color</label>
                        <input type="text" id="sidebar_color" wire:model="" name="sidebar_color" class="jscolor form-control mb-2"
                            value="{{ themecolor()->sidebar_color }}">
                        <hr>
                    </div>
                    {{-- <div class="col-md-10 mx-4">
                        <input type="text" id="colorInput" wire:model="color" name="sidebar_color_two"
                            class="jscolor form-control mb-2" value="">
                        <hr>
                    </div> --}}
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Links Color
                            Color</label>
                        <input type="text" id="sidebar_link_color" wire:model="color" name="sidebar_link_color"
                            class="jscolor form-control mb-2" value="{{ themecolor()->sidebar_link_color }}">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Color</label>

                            <input type="text" id="sidebar_active_item_color" wire:model="color" name="sidebar_active_item_color" class="jscolor form-control mb-2" value="{{ themecolor()->sidebar_active_item_color }}">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Background Color</label>
                        <input type="text" id="sidebar_active_item_background_color" wire:model="color" name="sidebar_active_item_background_color"
                        class="jscolor form-control mb-2" value="{{ themecolor()->sidebar_active_item_background_color }}">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Top Header Background Color</label>
                        <input type="text" id="top_header_background_color" wire:model="color" name="top_header_background_color"
                            class="jscolor form-control mb-2" value="{{ themecolor()->top_header_background_color }}">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Top Header Links Color</label>
                        <input type="text" id="header_link_color" wire:model="color" name="header_link_color"
                            class="jscolor form-control mb-2" value="{{ themecolor()->header_link_color }}">
                        <hr>
                    </div>

                    <br>
                    <div class="modal-footer mb-3 mx-3">
                        {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary mx-1">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-3 mb-3">
                {{-- Sideber --}}
                @include('backend.setups.themeStyle.sidebar');
                {{-- end sideber --}}
            </div>
            <div class="col-md-9">
                <form action="{{ route('sidebar.color.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="col-md-10 mx-4">
                        <br>

                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Background Color</label>
                        <input type="text" id="sidebar_color" wire:model="" name="sidebar_color" class="jscolor form-control mb-2"
                            value="">
                        <hr>
                    </div>
                    {{-- <div class="col-md-10 mx-4">
                        <input type="text" id="colorInput" wire:model="color" name="sidebar_color_two"
                            class="jscolor form-control mb-2" value="">
                        <hr>
                    </div> --}}
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Links Color
                            Color</label>
                        <input type="text" id="sidebar_link_color" wire:model="color" name="sidebar_link_color"
                            class="jscolor form-control mb-2" value="">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Color</label>

                            <input type="text" id="sidebar_active_item_color" wire:model="color"
                             name="sidebar_active_item_color" class="jscolor form-control mb-2" value="">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Background Color</label>
                        <input type="text" id="sidebar_active_item_background_color" wire:model="color" name="sidebar_active_item_background_color"
                        class="jscolor form-control mb-2" value="">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Top Header Background Color</label>
                        <input type="text" id="top_header_background_color" wire:model="color" name="top_header_background_color"
                            class="jscolor form-control mb-2" value="">
                        <hr>
                    </div>
                    <div class="col-md-10 mx-4">
                        <label for="submit-button-text" class="form-label">Top Header Links Color</label>
                        <input type="text" id="header_link_color" wire:model="color" name="header_link_color"
                            class="jscolor form-control mb-2" value="">
                        <hr>
                    </div>

                    <br>
                    <div class="modal-footer mb-3 mx-3">
                        {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary mx-1">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        @endif
    </div>


@endsection

@push('js')



<script>
    $(document).ready(function() {
    var originalColor;

    $('.metismenu a').hover(
        function() {

            originalColor = $(this).css('color');

            var newColor = $('#sidebar_active_item_color').val();
            $(this).css('color', newColor);
        },
        function() {

            $(this).css('color', originalColor);
        }
    );
});

    $(document).ready(function() {
    var originalColor;

    $('.metismenu a').hover(
        function() {
            originalColor = $(this).css('background-color');
            var newColor = $('#sidebar_active_item_background_color').val();
            $(this).css('background-color', newColor);
        },
        function() {
            $(this).css('background-color', originalColor);
        }
    );
    });

    $(document).ready(function() {
        var previousColor = '#ffffff';
        $('#sidebar_color').on('input', function() {
            var color = $(this).val();
            $('.sidebar-wrapper').css('background-color', color);
            $('.sidebar-wrapper ul').css('background-color', color);
            $('.sidebar-header').css('background-color', color);
            previousColor = color;
        });
    });

    $(document).ready(function() {
        $('#sidebar_link_color').on('input', function() {
            var color = $(this).val();
            $('.sidebar-wrapper .metismenu a').css('color', color);
        });
    });

    $(document).ready(function() {
        $('#top_header_background_color').on('input', function() {
            var color = $(this).val();
            $('.topbar').css('background', color);
        });
    });

    $(document).ready(function() {
        $('#header_link_color').on('input', function() {
            var color = $(this).val();
            $('.topbar a').css('color', color);
        });
    });







</script>


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
