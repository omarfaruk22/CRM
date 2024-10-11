<div>
    @include('livewire.modal')
    {{-- Currency Create --}}
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Add New Payment Mode</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Payment Mode Name</label>
                                <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="input3" placeholder="Payment Mode Name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Bank Accounts / Description</label>
                                <textarea wire:model.live="description" class="form-control @error('description') is-invalid @enderror" id="description"></textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" wire:model.live="active" name="active" id="active">
                                    <label class="form-check-label" for="active">Active </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="show_on_pdf" name="show_on_pdf" id="show_on_pdf">
                                    <label class="form-check-label" for="show_on_pdf">Show Bank Accounts / Description on Invoice PDF</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="selected_by_default" name="selected_by_default" id="selected_by_default">
                                    <label class="form-check-label" for="selected_by_default">Selected by default on invoice</label>
                                </div>

                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" wire:model.live="invoices_only" name="invoices_only" @if($expenses_only == 1) disabled @endif id="invoices_only">
                                    <label class="form-check-label" for="invoices_only">Invoices Only</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="expenses_only" name="expenses_only" @if($invoices_only == 1) disabled @endif id="expenses_only">
                                    <label class="form-check-label" for="expenses_only">Expenses Only</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Currency Edit --}}
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="createLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Edit Payment Mode</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="input3" class="form-label"><span class="text-danger">*</span> Payment Mode Name</label>
                                <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="input3" placeholder="Payment Mode Name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Bank Accounts / Description</label>
                                <textarea wire:model.live="description" class="form-control @error('description') is-invalid @enderror" id="description"></textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" wire:model.live="active" @if ($active == 1) checked @endif id="active">
                                    <label class="form-check-label" for="active">Active </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="show_on_pdf" name="show_on_pdf" @if ($show_on_pdf == 1) checked @endif id="show_on_pdf">
                                    <label class="form-check-label" for="show_on_pdf">Show Bank Accounts / Description on Invoice PDF</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="selected_by_default" name="selected_by_default" @if ($selected_by_default == 1) checked @endif id="selected_by_default">
                                    <label class="form-check-label" for="selected_by_default">Selected by default on invoice</label>
                                </div>

                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" wire:model.live="invoices_only" @if ($invoices_only == 1) checked @endif name="invoices_only" @if($expenses_only == 1) disabled @endif id="invoices_only">
                                    <label class="form-check-label" for="invoices_only">Invoices Only</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.live="expenses_only" @if ($expenses_only == 1) checked @endif name="expenses_only" @if($invoices_only == 1) disabled @endif id="expenses_only">
                                    <label class="form-check-label" for="expenses_only">Expenses Only</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#create">+ New Payment Mode</button>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Note:</strong> Payment modes listed below are offline modes. Payment gateways can be configured in Setup-> Settings->Payment Gateways
            </div>
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
                            <input type="text" wire:model.live="search" class="form-control" id="searchProductList"
                                autocomplete="off" placeholder="Search...">
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
                            <th>Bank Account / Description</th>
                            <th>Active</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payment_modes as $payment_mode)
                            
                        <tr>
                            <th scope="row">{{ $payment_mode->id }}</th>
                            <td>
                                {{ $payment_mode->name }}
                            </td>
                            <td>{{ ($payment_mode->description) ?? 'N/A'  }}</td>
                            <td>
                                <div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" @if ($payment_mode->active == 1) checked="" wire:click="deactive({{ $payment_mode->id }})" @else wire:click="active_status({{ $payment_mode->id }})" @endif>
								</div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" wire:click="edit({{ $payment_mode->id }})" data-bs-toggle="modal" data-bs-target="#edit">
                                    <span class="bx bx-edit fs-5"></span>
                                </a>
                                <a href="javascript:void(0);" wire:click="delete({{ $payment_mode->id }})" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                {{ $payment_modes->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:initialized', ()=>{
            @this.on('close-modal', (event) => {
                $('#edit').modal('hide');
                $('#create').modal('hide');
            });
        });
    </script>
@endpush
