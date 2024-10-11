<div>
    @include('livewire.modal')
    {{-- Currency Create --}}
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Add New Currency</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit="store">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Make sure to enter valid currency ISO code.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Currency
                                    Code</label>
                                <input type="text" wire:model.live="name"
                                    class="form-control @error('name') is-invalid @enderror" id="input3"
                                    placeholder="ISO Code">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span>
                                    Symbol</label>
                                <input type="text" wire:model.live="symbol"
                                    class="form-control @error('symbol') is-invalid @enderror" id="input3">
                                @error('symbol')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Decimal
                                    Separator</label>
                                <select wire:model.live="decimal_separator"
                                    class="form-control @error('decimal_separator') is-invalid @enderror">
                                    <option value=",">,</option>
                                    <option value=".">.</option>
                                </select>
                                @error('decimal_separator')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Thousand
                                    Separator</label>
                                <select wire:model.live="thousand_separator"
                                    class="form-control @error('thousand_separator') is-invalid @enderror">
                                    <option value=",">,</option>
                                    <option value=".">.</option>
                                    <option value="'">'apostrophe</option>
                                    <option value="">none</option>
                                    <option value=" ">space</option>
                                </select>
                                @error('thousand_separator')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Currency
                                    Placement</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" wire:model="placement"
                                            name="flexRadioDefault" id="flexRadioDefault1" checked value="before">
                                        <label class="form-check-label" for="flexRadioDefault1">Before Amount </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="placement"
                                            name="flexRadioDefault" id="flexRadioDefault2" value="after">
                                        <label class="form-check-label" for="flexRadioDefault2">After Amount</label>
                                    </div>
                                </div>
                                @error('placement')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Currency Edit --}}
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="createLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Edit Currency</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit="update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Make sure to enter valid currency ISO code.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Currency
                                    Code</label>
                                <input type="text" wire:model.live="name"
                                    class="form-control @error('name') is-invalid @enderror" id="input3"
                                    placeholder="ISO Code">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span>
                                    Symbol</label>
                                <input type="text" wire:model.live="symbol"
                                    class="form-control @error('symbol') is-invalid @enderror" id="input3">
                                @error('symbol')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Decimal
                                    Separator</label>
                                <select wire:model.live="decimal_separator"
                                    class="form-control @error('decimal_separator') is-invalid @enderror">
                                    <option value=",">,</option>
                                    <option value=".">.</option>
                                </select>
                                @error('decimal_separator')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Thousand
                                    Separator</label>
                                <select wire:model.live="thousand_separator"
                                    class="form-control @error('thousand_separator') is-invalid @enderror">
                                    <option value=",">,</option>
                                    <option value=".">.</option>
                                    <option value="'">'apostrophe</option>
                                    <option value="">none</option>
                                    <option value=" ">space</option>
                                </select>
                                @error('thousand_separator')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Currency
                                    Placement</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" wire:model="placement"
                                            name="flexRadioDefault" id="flexRadioDefault1" checked value="before">
                                        <label class="form-check-label" for="flexRadioDefault1">Before Amount </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="placement"
                                            name="flexRadioDefault" id="flexRadioDefault2" value="after">
                                        <label class="form-check-label" for="flexRadioDefault2">After Amount</label>
                                    </div>
                                </div>
                                @error('placement')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Base Currency Confirm Message --}}
    <div wire:ignore.self class="modal fade" id="confirm" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-end">
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3>Are you sure?</h3>
                    <p>Change the base currency</p>
                </div>
                <form wire:submit="default">
                    <div class="text-center my-4">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#create">+ New
        Currency</button>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div class="me-2 d-flex">
                    <div class="me-2">
                        <select class="form-select" wire:model.live="size" name="size">
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-outline-secondary">Export</button>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control"
                                id="searchProductList" autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($currencies as $currency)
                            <tr>
                                <th scope="row">{{ $currency->id }}</th>
                                <td>
                                    {{ $currency->name }} <br>
                                    {{ $currency->isdefault == 1 ? 'Base Currency' : '' }}
                                </td>
                                <td>{{ $currency->symbol }}</td>
                                <td>
                                    <a href="javascript:void(0);" wire:click="edit({{ $currency->id }})"
                                        data-bs-toggle="modal" data-bs-target="#edit">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    @if ($currency->isdefault == 0)
                                        <a href="javascript:void(0);" wire:click="base_currency({{ $currency->id }})"
                                            class="text-secondary" data-bs-toggle="modal" data-bs-target="#confirm">
                                            <span class="bx bx-star fs-5"></span>
                                        </a>
                                    @else
                                        <a href="javascript:void(0);" class="text-secondary">
                                            <span class="bx bxs-star fs-5"></span>
                                        </a>
                                    @endif
                                    <a href="javascript:void(0);" wire:click="delete({{ $currency->id }})"
                                        class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <span class="bx bx-trash fs-5"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Data Not Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $currencies->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('close-modal', (event) => {
                $('#edit').modal('hide');
                $('#create').modal('hide');
            });
        });
    </script>
@endpush
