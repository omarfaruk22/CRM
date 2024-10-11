<div>
    {{-- create timiesheet modal  --}}
    <div class="modal fade" id="addProjectdiscussion" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Discussion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="" wire:submit="store">
                            <input type="text" wire:model="project_id" value="{{ $mainproject_id }}">

                            <div class="col-md-12 py-2">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" wire:model="subject" name="subject" id="subject"
                                    class="form-control @error('subject')is-invalid @enderror">
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="note" class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" name="description" id="description" cols="10"
                                    rows="3"></textarea>
                            </div>

                            <div class="col-md-12 py-2">
                                <div class="form-check form-check-secondary">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        wire:model="show_to_customer" name="show_to_customer" id="show_to_customer">
                                    <label class="form-check-label" for="show_to_customer">
                                        Visible to Customer
                                    </label>
                                </div>
                            </div>

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
    {{-- end timesheet model  --}}
    {{-- edit timiesheet modal  --}}
    <div class="modal fade" id="editProjectdiscussion" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Discussion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 py-2">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" wire:model="subject" name="subject" id="subject"
                                class="form-control @error('subject')is-invalid @enderror">
                            @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 py-2">
                            <label for="note" class="form-label">Description</label>
                            <textarea class="form-control" wire:model="description" name="description" id="description" cols="10"
                                rows="3"></textarea>
                        </div>

                        <div class="col-md-12 py-2">
                            <div class="form-check form-check-secondary">
                                <input class="form-check-input" type="checkbox" value="1"
                                    wire:model="show_to_customer" name="show_to_customer" id="show_to_customer">
                                <label class="form-check-label" for="show_to_customer">
                                    Visible to Customer
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end timesheet edit model  --}}
    <div class="row">

        <div class="d-flex justify-content-between mb-3">

            <div class="">
                <a href="javascript:void(0);" class="btn btn-primary " data-bs-toggle="modal"
                    data-bs-target="#addProjectdiscussion">
                    <i class="bx bx-plus"></i>
                    Create Discussion
                </a>
                {{-- <a href="#" class="btn btn-outline-dark ">
                    <i class='bx bx-grid'></i>
                </a> --}}
            </div>

        </div>

    </div>

    {{-- table Start --}}
    <div>
        {{-- Delete  modal start --}}
        @include('livewire.modal')
        {{-- Delete  modal end --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class=" card-body">
                        <div class=" expensetable">
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
                                        <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Pdf</a></li>
                                            <li><a class="dropdown-item" href="#">Excel</a></li>
                                        </ul>
                                    </div>
                                    <!-- Adding Reset button -->
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reload"><i class="bx bx-reset"></i></button>
                                </div>

                                <div class="d-flex">
                                    <div class="search-box">
                                        <input type="text" wire:model.live="search" class="form-control"
                                            id="" autocomplete="off" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mb-3">
                                <table class="table mb-0 table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Last Activity</th>
                                            <th scope="col">Total Comments</th>
                                            <th scope="col">Visible to Customer</th>
                                            <th scope="col">Actions</th> <!-- Added action column header -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#editProjectdiscussion">
                                                    <span class="bx bx-edit fs-5"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
