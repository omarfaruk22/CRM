<div>

    <div class="mb-3">
		<button type="reset" class="btn btn-outline-secondary px-4" data-bs-toggle="modal" data-bs-target="#newTask">
            + New Task
        </button>
	</div>
    
    <hr>

    <div class="row">
        <div class="col">
            {{-- <div class="card"> --}}
                {{-- <div class=" card-body"> --}}
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                                    data-bs-target="#expensebulkActionsModal">
                                    Bulk Actions
                                </button>
                                <!-- Adding Reset button -->
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Reload"><i class="bx bx-reset"></i></button>
                            </div>

                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control" id=""
                                        autocomplete="off" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mb-3">
                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Select</th>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Assigned to</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Actions</th> <!-- Added action column header -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tasks->isNotEmpty())
                                        @foreach ($tasks as $data)
                                            {{-- @dd($data->taskAssigne->getStaffNamesArray()) --}}
                                            <tr>
                                                {{-- <td class="d-none">{!! implode('<br>', array_column($document->tags(), 'title')) ?: 'No tags' !!}</td> --}}
                                                <td><input type="checkbox" id="selectCheckbox" name="select"></td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('maintasks.taskview', $data->id) }}">
                                                        {{ $data->name }}
                                                    </a></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" type="button" id="dropdownMenu2"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            {{-- <span id="statusBadge"
                                                                class="badge rounded-pill bg-primary"></span> --}}
                                                            @if ($data->status == 0)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-info"> In Progress
                                                                </span>
                                                            @elseif($data->status == 1)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-secondary">Not
                                                                    Started</span>
                                                            @elseif($data->status == 2)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-info">
                                                                    Testing</span>
                                                            @elseif($data->status == 3)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-success">
                                                                    Awaiting Feedback</span>
                                                            @elseif($data->status == 4)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-success">
                                                                    Completed</span>
                                                            @else
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-danger">
                                                                    Error</span>
                                                            @endif
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenu2">
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_mark_as(0, {{ $data->id }}); return false;">Mark
                                                                    as In Progress</a></li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_mark_as(1, {{ $data->id }}); return false;">Mark
                                                                    as Not Start</a></li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_mark_as(2, {{ $data->id }}); return false;">Mark
                                                                    as Testing</a></li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_mark_as(3, {{ $data->id }}); return false;">Mark
                                                                    as Awaiting Feedback</a></li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_mark_as(4, {{ $data->id }}); return false;">Mark
                                                                    as Complete</a></li>
                                                        </ul>
                                                    </div>


                                                </td>
                                                <td>{{ $data->startdate ?? 'Not Found' }}</td>
                                                <td>{{ $data->duedate ?? 'Not Found' }}</td>
                                                <td>
                                                    @if (!empty($data->id))
                                                        @php
                                                            $assign = DB::table('task_assignes')
                                                                ->where('taskid', $data->id)
                                                                ->first();
                                                        @endphp
                                                        @if ($assign)
                                                            @php
                                                                $staffids = explode(',', $assign->staffid);
                                                            @endphp
                                                            @foreach ($staffids as $staffid)
                                                                @php
                                                                    $staff = DB::table('users')
                                                                        ->where('id', $staffid)
                                                                        ->first();
                                                                @endphp
                                                                @if ($staff)
                                                                    {{ $staff->name }} <br>
                                                                @else
                                                                    Not Found
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            Not Found
                                                        @endif
                                                    @endif
                                                </td>


                                                <td>
                                                    @foreach ($data->tagables as $tags)
                                                        @php
                                                            $tagIds = explode(',', $tags->tag_id);
                                                            $tags = \App\Models\Tag::whereIn('id', $tagIds)->get();
                                                        @endphp
                                                        @foreach ($tags as $tagId)
                                                            <br>
                                                            <span class="badge bg-light text-black mb-1"
                                                                style="font-size:15px; font-weight: normal;">
                                                                {{ $tagId->tags }}
                                                            </span>
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" type="button" id="dropdownMenu2"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            {{-- <span id="statusBadge"
                                                                class="badge rounded-pill bg-primary"></span> --}}
                                                            @if ($data->priority == 1)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-secondary"> Low
                                                                </span>
                                                            @elseif($data->priority == 2)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-info">Medium</span>
                                                            @elseif($data->priority == 3)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-warning">
                                                                    High</span>
                                                            @elseif($data->priority == 4)
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-danger">
                                                                    Urgent</span>
                                                            @else
                                                                <span id="statusBadge"
                                                                    class="badge rounded-pill bg-danger">
                                                                    Error</span>
                                                            @endif
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenu2">
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_priority_as(1, {{ $data->id }}); return false;">Low</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_priority_as(2, {{ $data->id }}); return false;">Medium</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_priority_as(3, {{ $data->id }}); return false;">High</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="task_priority_as(4, {{ $data->id }}); return false;">Urgent</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </td>
                                                <td>
                                                    <a href="{{ route('maintasks.taskview', $data->id) }}">
                                                        <span class="bx bx-show fs-5"></span>
                                                    </a>

                                                    <a href="{{ route('support.task_edit_from_support', ['id' => $data->id, 'ticketId' => $ticketId]) }}">
                                                        <span class="bx bx-edit fs-5"></span>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{$data->id, $ticketId}}">
                                                        <span class="bx bx-trash text-danger fs-5"></span>
                                                    </a>

                                                    {{-- delete modal start --}}
                                                    <div class="modal fade" id="delete{{$data->id, $ticketId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="text-end">
                                                                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body text-center">
                                                                    <h2>Are you sure?</h2>
                                                                    <p>Delete this data</p>
                                                                </div>

                                                                <div class="text-center my-4">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="{{ route('support.task_delete_from_support', ['id' => $data->id, 'ticketId' => $ticketId]) }}" method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- delete modal end --}}

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                No data found.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-2">{{ $tasks->links('vendor.livewire.bootstrap') }}</div>
                        </div>
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function task_mark_as(status, task_id) {
            $.ajax({
                url: '{{ route('tasks.status.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    task_id: task_id
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Status Updated Successfully',
                            timer: 1500 // 
                        }).then((result) => {
                            location.reload();
                        });

                    } else {
                        console.error('Failed to update status');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    <script>
        function task_priority_as(priority, task_id) {
            $.ajax({
                url: '{{ route('tasks.priority.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    priority: priority,
                    task_id: task_id
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'priority Updated Successfully',
                            timer: 1500 // 
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        console.error('Failed to update status');
                    }
                },
                error: function(xhr, priority, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
@endpush