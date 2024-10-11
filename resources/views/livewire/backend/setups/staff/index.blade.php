<div>
    @include('livewire.modal')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-1">
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

                    <div class="dropdown me-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Pdf</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Excel</a></li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('setup.staff.index') }}" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Reload" data-bs-original-title="Reload"><i class="bx bx-reset"></i></a>
                    </div>

                </div>

                <div class="">
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($staffs as $staff)
                            <tr>
                                <td>{{ $staffs->firstItem() + $loop->index }}</td>
                                <td><a href="{{ route('setup.staff.show', $staff->id) }}">{{ $staff->firstname.' '.$staff->lastname }}</a></td>
                                <td>{{ $staff->email }}</td>
                                <td>
                                    {{ staff_role($staff->role) }}
                                </td>
                                <td class="text-center">
                                    @if ($staff->status == 1)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input staff-checkbox" type="checkbox" checked data-id="{{ $staff->id }}">
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input staff-checkbox" type="checkbox" data-id="{{ $staff->id }}">
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    @if ($staff->last_login != NULL)
                                        @php
                                            $currentTime = \Carbon\Carbon::now();
                                            $lastLogin = \Carbon\Carbon::parse($staff->last_login);
                                            $timeDifference = $currentTime->diff($lastLogin);
                                            $formattedDifference = '';
                                
                                            if ($timeDifference->h > 0) {
                                                $formattedDifference .= $timeDifference->h . ' hours';
                                            }

                                            if ($timeDifference->i > 0) {
                                                if ($formattedDifference !== '') {
                                                    $formattedDifference .= ', ';
                                                }
                                                $formattedDifference .= $timeDifference->i . ' minutes ago';
                                            }

                                            if ($timeDifference->s > 0 && $formattedDifference === '') {
                                                $formattedDifference .= $timeDifference->s . ' seconds ago';
                                            }
                                        
                                            if ($formattedDifference === '' && $timeDifference->s > 0) {
                                                $formattedDifference .= $timeDifference->s . ' seconds ago';
                                            }
                                        @endphp

                                        {{ $formattedDifference }}
                                        
                                    @endif
                                </td>

                                <td>{{ $staff->created_by }}</td>
                                <td>{{ $staff->updated_by }}</td>
                                <td>
                                    <a href="{{ route('setup.staff.show', $staff->id) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    
                                    <a href="javascript:void(0);" wire:click="delete({{ $staff->id }})"
                                        class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <span class="bx bx-trash fs-5"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Not Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $staffs->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>

