<div>
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
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Export</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pdf</a></li>
                    <li><a class="dropdown-item" href="#">Excel</a></li>
                </ul>
            </div>
        </div>

        <div class="d-flex">
            <div class="search-box">
                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off"
                    placeholder="Search...">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
    </div>


    <div class="table-responsive mb-3">
        <table class="table mb-0 table-hover align-middle">

            <thead>
                <tr>
                    <th scope="col">#Sl</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Members</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></td>
                        <td><a>{{ $project->customer->company }}</a></td>
                        <td>
                            @foreach ($project->tagables as $tags)
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
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->deadline }}</td>
                        <td>
                            @if (!empty($project->id))
                                @php
                                    $assign = DB::table('project_members')
                                        ->where('project_id', $project->id)
                                        ->first();
                                @endphp
                                @if ($assign)
                                    @php
                                        $staffids = explode(',', $assign->staff_id);
                                    @endphp
                                    @foreach ($staffids as $staffid)
                                        @php
                                            $staff = DB::table('users')->where('id', $staffid)->first();
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
                            @if ($project->status == 2)
                                <span id="statusBadge" class="badge rounded-pill bg-info"> In Progress
                                </span>
                            @elseif($project->status == 1)
                                <span id="statusBadge" class="badge rounded-pill bg-secondary">Not
                                    Started</span>
                            @elseif($project->status == 5)
                                <span id="statusBadge" class="badge rounded-pill bg-danger">
                                    Cancelled</span>
                            @elseif($project->status == 3)
                                <span id="statusBadge" class="badge rounded-pill bg-info">
                                    On Hold</span>
                            @elseif($project->status == 4)
                                <span id="statusBadge" class="badge rounded-pill bg-success">
                                    Completed</span>
                            @else
                                <span id="statusBadge" class="badge rounded-pill bg-danger">
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}">
                                <span class="bx bx-show fs-5"></span>
                            </a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#copy">
                                <i class="fadeIn animated bx bx-copy-alt"></i>
                            </a>
                            <a href="{{ route('projects.edit', $project->id) }}">
                                <span class="bx bxs-edit fs-5"></span>
                            </a>
                            <a href="">
                                <span class="bx bx-trash text-danger fs-5"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">{{ $projects->links('vendor.livewire.bootstrap') }}</div>
    </div>
</div>
