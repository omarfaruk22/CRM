<div>
    <div class="d-flex justify-content-between">
        <h4 class="mt-3">Notes</h4>
        <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="collapse" data-bs-target="#addNote"
            aria-expanded="false" aria-controls="collapseExample">+ New Note</button>
    </div>

    <div class="card">
        <div class="card-body">

            @include('backend.customer.note.create')

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
                        <a href="{{ route('customers.profile.notes.export') }}" class="btn btn-outline-secondary">Export</a>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control" id="searchProductList"
                                autocomplete="off" placeholder="Search Users...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripotion</th>
                            <th>Added From</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notes as $note)
                            <tr>
                                <th scope="row">{{ $note->id }}</th>
                                <td>
                                    @if ($edit_status == 0)
                                        {{ $note->description }}
                                    @else
                                        <form wire:submit="update">
                                            <div>
                                                <div class="mb-3">
                                                    <textarea name="ticket_description" wire:model="description" class="form-control" id="input11" rows="4">{{ $description }}</textarea>
                                                </div>
                                                <div class="mb-3 text-end">
                                                    <button type="button" wire:click="edit_close"
                                                        class="btn btn-danger">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </td>
                                <td>mr dev</td>
                                <td>{{ $note->created_at }}</td>
                                <td>
                                    <a href="javascript:void(0);" wire:click="edit({{ $note->id }})">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    <form
                                        class="bx fs-5"action="{{ route('customers.profile.notes.delete', ['id' => $note->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="border:none; background: none;"
                                            class="bx bx-trash text-danger fs-5" href="" type="submit"
                                            class="btn btn-danger"></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Note Not Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
