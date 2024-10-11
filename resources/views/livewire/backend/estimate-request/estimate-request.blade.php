<div>
    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">
                <a href="{{ route('estimate.create') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i> New Form
                </a>
            </div>
            <div class=""></div>
        </div>

        <div class="col-md-12">
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
                                <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                    <li><a class='dropdown-item' href='#'>Excel</a></li>
                                </ul>
                            </div>

                            <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
                        </div>

                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <table class="table mb-0 table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#Sl</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Assigned</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Updated By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($estimateRequestForms)>0)
                                    @foreach ($estimateRequestForms as $estimateRequestForm)
                                        <tr>
                                            <td> {{ $estimateRequestForms->firstItem() + $loop->index }} </td>
                                            <td><a class="text-primary" href="{{ route('estimate.show') }}">{{ $estimateRequestForm->staff->email }}</a></td>
                                            <td>
                                                @php
                                                    $notify_ids = $estimateRequestForm->notify_ids ? explode(',', $estimateRequestForm->notify_ids) : [];
                                                @endphp

                                                @if (!empty($notify_ids))
                                                    @php
                                                        $staffs = \DB::table('staff')->whereIn('id', $notify_ids)->get();
                                                        $roles = \DB::table('roles')->whereIn('id', $notify_ids)->get();
                                                    @endphp

                                                    @if ($estimateRequestForm->notify_type == 'specific_staff')
                                                        @foreach ($staffs as $staff)
                                                            <div class="chip">
                                                                {{ $staff->firstname.' '.$staff->lastname }}
                                                            </div><br>
                                                        @endforeach
                                                    @endif
                                                    
                                                    @if ($estimateRequestForm->notify_type == 'roles')
                                                        @foreach ($roles as $role)
                                                            <div class="chip">
                                                                {{ $role->name}}
                                                            </div><br>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $estimateRequestForm->staff->firstname.' '.$estimateRequestForm->staff->lastname }}</td>
                                            <td>{{ $estimateRequestForm->estimateRequestStatus->name }}</td>
                                            <td>{{ $estimateRequestForm->created_at }}</td>
                                            <td>{{ $estimateRequestForm->creator->name }}</td>
                                            <td>
                                                {{-- {{ $estimateRequestForm->updator->name }} --}}
                                            </td>
                                            <td>
                                                <a class="text-primary" href="{{ route('estimate.show') }}">
                                                    <span class="bx bx-show fs-5"></span>
                                                </a>
                                                
                                                <a class="text-primary" href="{{ route('estimate.edit', $estimateRequestForm->id) }}">
                                                    <span class="bx bx-edit fs-5"></span>
                                                </a>

                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete{{ $estimateRequestForm->id }}">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>
                                                
                                                <div class="modal fade" id="delete{{ $estimateRequestForm->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="text-end">
                                                                <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3>Are you sure?</h3>
                                                                <p>Delete this data</p>
                                                            </div>
                                                            <div class="text-center my-4">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('estimate.delete', $estimateRequestForm->id) }}" class="btn btn-danger">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No data found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>{{ $estimateRequestForms->links('vendor.livewire.bootstrap') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
