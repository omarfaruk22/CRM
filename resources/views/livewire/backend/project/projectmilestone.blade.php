<div>
    {{-- create milestone modal  --}}
    <div class="modal fade" id="addProjectmilestone" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Milestone</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="" wire:submit="store">

                            <input type="hidden" wire:model="project_id" name="project_id" id="project_id"
                                value="{{ $mainproject_id }}">

                            <div class="col-md-12 py-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    wire:model="name" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control  @error('start_date') is-invalid @enderror"
                                    wire:model="start_date" name="start_date" id="start_date">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control  @error('due_date') is-invalid @enderror"
                                    wire:model="due_date" name="due_date" id="due_date">
                                @error('due_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" name="description" id="description" cols="10"
                                    rows="3"></textarea>
                            </div>

                            <div class="col-md-12 py-2">
                                <div class="form-check form-check-secondary">
                                    <input class="form-check-input" wire:model="description_visible_to_customer"
                                        name="description_visible_to_customer" type="checkbox" value="1"
                                        id="description_visible_to_customer" checked="">
                                    <label class="form-check-label" for="description_visible_to_customer">
                                        Show description to customer
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="milestone_order" class="form-label">Order</label>
                                <input type="number" class="form-control" wire:model="milestone_order"
                                    name="milestone_order" id="milestone_order">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end milestone model  --}}
    {{-- edit milestone modal  --}}
    <div class="modal fade" wire:ignore.self id="editProjectmilestone" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Milestone</h5>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="" wire:submit="update">
                            <div class="col-md-12 py-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    wire:model="name" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 py-2">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control  @error('start_date') is-invalid @enderror"
                                    wire:model="start_date" name="start_date" id="start_date">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control  @error('due_date') is-invalid @enderror"
                                    wire:model="due_date" name="due_date" id="due_date">
                                @error('due_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" name="description" id="description" cols="10"
                                    rows="3"></textarea>
                            </div>


                            <div class="col-md-12 py-2">
                                <div class="form-check form-check-secondary">
                                    <input class="form-check-input" wire:model="description_visible_to_customer"
                                        name="description_visible_to_customer" type="checkbox"
                                        id="description_visible"
                                        {{ $description_visible_to_customer == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="description_visible">
                                        Show description to customer
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="milestone_order" class="form-label">Order</label>
                                <input type="number" class="form-control" wire:model="milestone_order"
                                    name="milestone_order" id="milestone_order">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end milestone edit model  --}}
    <div class="row">

        <div class="d-flex justify-content-between mb-3">

            <div class="">
                <a href="javascript:void(0);" class="btn btn-primary " data-bs-toggle="modal"
                    data-bs-target="#addProjectmilestone">
                    <i class="bx bx-plus"></i>
                    New Milestone
                </a>
                {{-- <a href="#" class="btn btn-outline-dark ">
                    <i class='bx bx-grid'></i>
                </a> --}}
            </div>

            <div class="">
                <div class="form-check form-check-secondary">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckeSecondary"
                        checked="">
                    <label class="form-check-label" for="flexCheckCheckeSecondary">
                        Exclude Completed Tasks
                    </label>
                </div>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Actions</th> <!-- Added action column header -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($milestones->isNotEmpty())
                                            @foreach ($milestones as $milestone)
                                                <tr>
                                                    <td>{{ $milestone->name }}</td>
                                                    <td>{{ $milestone->start_date }}</td>
                                                    <td>{{ $milestone->due_date }}</td>
                                                    <td>{{ $milestone->description }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            wire:click="edit({{ $milestone->id }})"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editProjectmilestone">
                                                            <span class="bx bx-edit fs-5"></span>
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal"
                                                            wire:click="delete({{ $milestone->id }})"
                                                            data-bs-target="#delete">
                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    No data found.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="p-3">{{ $milestones->links('vendor.livewire.bootstrap') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
