<div>

    {{-- List page start --}}
    <div class="">
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
                        <th>Subject</th>
                        <th>Tags</th>
                        <th>Department</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Last Reply</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($otherTickets->isNotEmpty())
                        @foreach ($otherTickets as $otherTicket)
                            <tr>
                                <td>{{ $otherTickets->firstItem() + $loop->index }}</td>
                                <td>
                                    <a href="{{route('support.show', $otherTicket->id)}}">
                                        <span class="text-primary">{{ $otherTicket->subject }}</span>
                                    </a>
                                </td>
                                <td>
                                    @php $otherTicketTags = explode(',', $otherTicket->tags); @endphp
                                    @if (!empty($allTags))
                                        @foreach ($allTags as $allTag)
                                            @if (in_array($allTag->id, $otherTicketTags))
                                                <span class="chip chip-lg">{{ $allTag->tags }}</span><br>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($allDepartments))
                                        @foreach ($allDepartments as $allDepartment)
                                            @if ($otherTicket->departmentid == $allDepartment->id)
                                                {{ $allDepartment->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($allContacts))
                                        @foreach ($allContacts as $allContact)
                                            @if ($otherTicket->contactid == $allContact->id)
                                                {{ $allContact->firstname.' '.$allContact->lastname }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($allStatuses))
                                        @foreach ($allStatuses as $allStatus)
                                            @if ($otherTicket->statusId == $allStatus->id)
                                                {{ $allStatus->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($allPriorities))
                                        @foreach ($allPriorities as $allPriority)
                                            @if ($otherTicket->priorityId == $allPriority->id)
                                                {{ $allPriority->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>No Reply Yet</td>
                                <td>{{ $otherTicket->created_by }}</td>
                                <td>{{ $otherTicket->updated_by }}</td>
                                <td>
                                    <a href="{{ route('support.show', $otherTicket->id) }}">
                                        <span class="bx bx-show fs-5 text-primary"></span>
                                    </a>

                                    <a href="{{ route('support.show.settings', $otherTicket->id) }}">
                                        <span class="bx bx-edit fs-5 text-primary"></span>
                                    </a>

                                    <a href="{{ route('support.view_public_form', $otherTicket->id) }}">
                                        <span class="bx bx-spreadsheet text-primary" style="font-size: 21px;"></span>
                                    </a>

                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_form_others_ticket{{ $otherTicket->id }}">
                                        <span class="bx bx-trash text-danger fs-5 text-primary"></span>
                                    </a>

                                    <div class="modal fade" id="delete_form_others_ticket{{ $otherTicket->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                
                                                <div class="text-end">
                                                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                                                </div>

                                                <div class="modal-body text-center">
                                                    <h2>Are you sure?</h2>
                                                    <p>Delete this data</p>
                                                </div>

                                                <div class="text-center my-4">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="{{ route('support.delete_ticket', $otherTicket->id) }}" class="btn btn-danger">Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11" class="text-center">No data found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div>{{ $otherTickets->links('vendor.livewire.bootstrap') }}</div>
    </div>
    {{-- List page end --}}
</div>
