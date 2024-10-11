<div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="col mb-3">
                        <a href="{{ route('support.pre_reply.create') }}" type="button" class="btn btn-primary px-2">+ New
                            Predefined Reply</a>
                    </div>

                    <div class="d-flex justify-content-between mb-4">

                        <div class="me-2 d-flex">
                            <div class="me-2">
                                <select class="form-select" wire:model.live="size" name="size">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option selected value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="dropdown me-2">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pdf</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                </ul>
                            </div>
                            <div class="">
                                <a href="{{ route('support.pre_reply.index') }}" type="button"
                                    class="btn btn-outline-secondary">Reset</a>
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
                        <table id="tableId" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Predefined Reply Name</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($predefinedReplies->isNotEmpty())
                                    @foreach ($predefinedReplies as $predefinedReplie)
                                        <tr>
                                            <td>{{ $predefinedReplies->firstItem() + $loop->index }}</td>
                                            <td>{{ $predefinedReplie->name }}</td>
                                            <td>{{ $predefinedReplie->created_by }}</td>
                                            <td>{{ $predefinedReplie->updated_by }}</td>
                                            <td>

                                                <a href={{ route('support.pre_reply.edit', $predefinedReplie->id) }}>
                                                    <span class="bx bx-edit fs-5"></span>
                                                </a>

                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteReplay">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>

                                                {{-- Delete Department modal start  --}}
                                                <div wire:ignore.self class="modal fade" id="deleteReplay"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="text-end">
                                                                <button type="button" class="btn-close m-3"
                                                                    data-bs-dismiss="modal" wire:click="closeModal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3>Are you sure?</h3>
                                                                <p>Delete this data</p>
                                                            </div>
                                                            <form
                                                                action="{{ route('support.pre_reply.delete', $predefinedReplie->id) }}">
                                                                <div class="text-center my-4">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        wire:click="closeModal"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Delete Department modal end  --}}

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No data found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div>{{ $predefinedReplies->links('vendor.livewire.bootstrap') }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
