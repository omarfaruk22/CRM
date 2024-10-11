<div>
    @include('livewire.modal')
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Add New Tax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store">
                    <div class="modal-body">
                        <div class="col-12">
                            @include('backend.partials.alert')
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="input3" class="form-label"><span class="text-danger">*</span> Tax Name</label>
                            <input type="text" wire:model.live="name"
                                class="form-control @error('name') is-invalid @enderror" id="input3"
                                placeholder="Tax Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="input3" class="form-label"> Tax Rate (percent)</label>
                            <input type="number" wire:model.live="rate"
                                class="form-control @error('rate') is-invalid @enderror" id="input3"
                                placeholder="Tax Rate">
                            @error('rate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            You can't update this tax because the tax is used by expenses transactions.
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="input3" class="form-label"><span class="text-danger">*</span> Tax Name</label>
                            <input type="text" wire:model.live="name" class="form-control" id="input3"
                                placeholder="Tax Name" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="input3" class="form-label">Tax Rate (percent)</label>
                            <input type="number" class="form-control" wire:model.live="rate" id="input3"
                                placeholder="Tax Rate" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" disabled>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#create">+ New
        Tax</button>

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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tax Name</th>
                            <th>Rate (Percent)</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($taxs as $tax)
                            <tr>
                                <th scope="row">{{ $tax->id }}</th>
                                <td>{{ $tax->name }}</td>
                                <td>{{ number_format($tax->rate, 2) }}%</td>
                                <td>
                                    <a href="javascript:void(0);" wire:click="edit({{ $tax->id }})"
                                        data-bs-toggle="modal" data-bs-target="#edit">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    <a href="javascript:void(0);" wire:click="delete({{ $tax->id }})"
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
                {{ $taxs->links('vendor.livewire.bootstrap') }}
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
