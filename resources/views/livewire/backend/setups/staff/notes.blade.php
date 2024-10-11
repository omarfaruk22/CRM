<div>

    {{-- Notes update modal start --}}
    <div class="col" wire:ignore.self>
        <form wire:submit.prevent="update">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Note Description</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <textarea name="description" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Notes update modal end --}}


    {{-- Delete modal start --}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-end">
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3>Are you sure?</h3>
                    <p>Delete this data</p>
                </div>
                <form wire:submit.prevent="destroy">
                    <div class="text-center my-4">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete modal end --}}


    
    <div wire:ignore.self>

        <h4 class="mt-3">Notes</h4>
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="collapse" data-bs-target="#addNote" aria-expanded="false" aria-controls="collapseExample">+ New Note</button>
                </div>
            </div>

            <div class="card-body">

                {{-- Store notes start  --}}
                <form wire:submit="store">
                    <div class="collapse" id="addNote">

                        <div class="mb-3">
                            <label for="description" class="form-label">Note Description</label>
                            <textarea name="description" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Note Description" rows="4"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                {{-- Store notes end  --}}

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
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pdf</a></li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#Sl</th>
                                <th>Note</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($notes->isNotEmpty())
                                @foreach ($notes as $note)
                                    <tr>
                                        <td>{{ $notes->firstItem() + $loop->index }}</td>
                                        <td>{{ $note->description }}</td>
                                        <td>{{ $note->created_by }}</td>
                                        <td>{{ $note->updated_by }}</td>
                                        <td>{{ $note->created_at }}</td>
                                        <td>{{ $note->updated_at }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit({{ $note->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);" wire:click="delete({{ $note->id }})" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="my-3">{{ $notes->links('vendor.livewire.bootstrap') }}</div>
            </div>
        </div>
    </div>
</div>
