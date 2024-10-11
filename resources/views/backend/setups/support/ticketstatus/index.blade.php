@extends('backend.layouts.main')
@section('title', 'New Ticket Status')
@section('content')

<livewire:backend.setups.supports.ticket-status/>


@endsection


@push('js')

    {{-- Create color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>
    
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var createColorInput = document.getElementById("createColorInput");
                var picker = new jscolor(createColorInput);
                picker.fromHSV(0, 100, 100); 
                picker.onFineChange = function() {
                createColorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>
    {{-- Create color picker end  --}}
    
@endpush

     
   
 










