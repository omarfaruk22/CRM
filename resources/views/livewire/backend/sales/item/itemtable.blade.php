<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="row">
        <div class="col">
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
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pdf</a></li>
                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id=""
                                    autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Select</th>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Tax2</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Group ID</th>

                                    <th scope="col">Currency</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $iterationCount = 0;
                                @endphp


                                @if (isset($items) && count($items) > 0)
                                    @foreach ($items as $key => $item)
                                        @php $iterationCount++; @endphp
                                        <tr>
                                            <td>
                                                <!-- Action buttons (Edit, Copy, Delete) -->
                                                <a wire:click="editItemview({{ $item->id }})" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target="#editItemModalmainlive">
                                                    <span class="text-info mx-2"><i
                                                            class='bx bx-edit-alt fs-5'></i></span>
                                                </a>
                                                <a wire:click="deleteItemview({{ $item->id }})" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteLeadModal">
                                                    <span class="text-danger mx-2"><i
                                                            class='bx bx-trash text-danger fs-5'></i></span>
                                                </a>
                                            </td>
                                            <td><input type="checkbox"></td>
                                            <td>{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->long_description }}</td>
                                            <td>{{ $item->rate }}</td>
                                            <td>{{ $item->tax }}</td>
                                            <td>{{ $item->tax2 }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->group_id }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mx-3 my-3">
                                <div>{{ $items->links('vendor.livewire.bootstrap') }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Edit Item Modal -->

    <div class="modal fade" id="editItemModalmainlive" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="editItemModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label"><span class="text-danger">*</span>
                                    Description</label>
                                <input type="text" wire:model="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror" required>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="longDescription" class="form-label">Long Description</label>
                                <textarea wire:model="long_description" id="longDescription"
                                    class="form-control @error('long_description') is-invalid @enderror" rows="4"></textarea>
                                @error('long_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="rateUSD" class="form-label"><span class="text-danger">*</span> Rate -
                                    USD
                                    (Base Currency)</label>
                                <div class="input-group">
                                    <input type="number" wire:model="rate" id="rateUSD"
                                        class="form-control @error('rate') is-invalid @enderror">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="rateUSDCheckbox" class=""
                                            value="USD" checked >
                                    </div>
                                </div>
                                @error('rate')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-12">
                                <label for="rateEUR" class="form-label">Rate - EUR</label>
                                <div class="input-group">
                                    <input type="number" wire:model="rate" id="rateEUR"
                                        class="form-control @error('rateEUR') is-invalid @enderror">
                                    <div class="input-group-text">
                                        <input type="checkbox" wire:model="rateEURCheckbox" id=""
                                            class="" value="EUR">
                                    </div>
                                </div>

                                @error('rateEUR')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label for="tax1" class="form-label">Tax 1</label>
                                <select wire:model="tax1" id="tax1"
                                    class="form-select @error('tax1') is-invalid @enderror">
                                    <option disabled selected>Tax1 Select</option>
                                    @if (isset($taxes))
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax['rate'] }}">{{ $tax['rate'] }}%</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('tax1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tax2" class="form-label">Tax 2</label>
                                <select wire:model="tax2" id="tax2"
                                    class="form-select @error('tax2') is-invalid @enderror">
                                    <option disabled selected>Tax2 Select</option>

                                    {{-- @php dd($taxes) @endphp --}}
                                    @if (isset($taxes))
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax['rate'] }}">{{ $tax['rate'] }}%</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('tax2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="number" wire:model="unit" id="unit"
                                    class="form-control @error('unit') is-invalid @enderror">
                                @error('unit')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="itemGroup" class="form-label">Item Group</label>
                                <select wire:model="group_id" id="group_id"
                                    class="form-select @error('group_id') is-invalid @enderror">
                                    <option disabled selected>Select Group</option>
                                    @if ($groups)
                                        @foreach ($groups as $group)
                                            <option value="{{ $group['id'] }}">{{ $group['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('group_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="closeModal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
