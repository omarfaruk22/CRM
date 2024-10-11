<div>

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
                    <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Background Color</label>
                    <input type="text" id="colorInput" wire:model="" name="color1" class="jscolor form-control mb-2"
                        value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Menu Links Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color2"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Background
                        Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color3"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Sidebar Menu/Setup Active Item Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color4"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Top Header Background Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color5"
                        class="jscolor form-control mb-2" value="">
                    <hr>
                </div>
                <div class="col-md-10 mx-4">
                    <label for="submit-button-text" class="form-label">Top Header Links Color</label>
                    <input type="text" id="colorInput" wire:model="color" name="color6"
                        class="jscolor form-control mb-2" value="">
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
</div>
