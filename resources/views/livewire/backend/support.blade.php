<div>

    @push('css')
        <style>
            @media (max-width: 768px) {
                .bulkActions {
                    font-size: 8px;
                }
            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

        <style>
            .hidden {
                display: none;
            }
        </style>
    @endpush


    {{-- Create new tag modal start  --}}
    <form action="{{ route('support.create_tag_from_bulk_action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create new tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" name="tags" type="text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Create new tag modal end  --}}


    {{-- Bulk Actions Modal start  --}}
    <div class="col">
		<div class="modal fade" id="bulkActionsModal" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title">Bulk Actions</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

                    <div class="modal-body">
                        <!-- Check box start -->
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="merge_tickets" id="merge_tickets">
                            <label for="merge_tickets">Merge Tickets</label>
                        </div>
                        <div class="checkbox checkbox-danger" id="mass_check_box">
                            <input type="checkbox" name="mass_delete" id="mass_delete">
                            <label for="mass_delete">Mass Delete</label>
                        </div>
                        <!-- Check box end-->

                        

                        <div class="mt-3" id="hideByMassDelete">

                            <hr>

                            <div class="mb-3">
                                <label for="changeStatus" class="form-label">Change Status</label>
                                <select class="form-control" id="changeStatus" name="changeStatus">
                                    <option disabled selected>Select status</option>
                                    @if (!empty($ticketStatuses))
                                        @foreach ($ticketStatuses as $ticketStatus)
                                            <option value="{{ $ticketStatus->id }}">{{ $ticketStatus->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-control" id="department" name="department">
                                    <option disabled selected>Select department</option>
                                    @if (!empty($departments))
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="ticketPriority" class="form-label">Ticket Priority</label>
                                <select class="form-control" id="ticketPriority" name="ticketPriority">
                                    <option disabled selected>Select ticket priority</option>
                                    @if (!empty($ticketPriorities))
                                        @foreach ($ticketPriorities as $ticketPriority)
                                            <option value="{{ $ticketPriority->id }}">{{ $ticketPriority->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                    <label for="tags" class="form-label">Tags</label><br>
                                <div class="input-group" style="width: 100%">
                                    <div class="" style="width: 95%">
                                        <select id="tags" class="form-select" multiple="multiple" name="tags[]" data-select2-id="select2-data-tag1" tabindex="-1" aria-hidden="true">
                                            @if (!empty($tags))
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->tags }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="" style="width: 5%">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%; padding: 5px;">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="service" class="form-label">Service</label>
                                <select class="form-control" id="service" name="service">
                                    <option disabled selected>Select service</option>
                                    @if (!empty($services))
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="mt-3" id="oprnByMergeTickets" style="display: none;">

                            <hr>

                            <div class="mb-3">
                                <label for="primaryTicket" class="form-label"><span class="text-danger">*</span> Primary Ticket</label>
                                <select class="form-control" id="primaryTicket" name="primaryTicket">
                                    <!-- Options here -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="primaryTicketStatus" class="form-label"><span class="text-danger">*</span> Primary Ticket Status</label>
                                <select class="form-control" id="primaryTicketStatus" name="primaryTicketStatus">
                                    <!-- Options here -->
                                </select>
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
	</div>
    <!-- Bulk Actions Modal end -->


    <div class="row">

        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('support.create') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i> New Tickets
                </a>
                <button id="supportButton" class="btn btn-outline-dark me-2 mb-3">
                    <i class="fadeIn animated bx bx-filter"></i>
                </button>
            </div>

            <div>
                <button class="btn btn-outline-dark btn-sm mb-3" data-bs-toggle="collapse" data-bs-target="#filterDiv" aria-expanded="false" aria-controls="filterDiv" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
                    <i class="bx bx-filter-alt m-0"></i>
                </button>
                <div id="filterDiv" class="collapse" style="z-index: 9999;">
                    <div class="card">
                        <div class="card-body">
                            <div><a href="#">New Filter</a></div>
                            <p class="card-text">No saved filters, get started by creating a new filter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-3"><span><i class='bx bx-spreadsheet'></i></span>Tickets Summary</h5>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-2 col-6">
                            <p  class="my-0 py-0"><span class="fs-5">0</span> <span class="text-danger fs-7"> Open</span></p>
                            <p class="my-0 py-0"><span class="fs-5">0</span> <span class="text-info fs-7"> Close</span></p>
                        </div>
                        <div class="col-md-2 col-6">
                            <p  class="my-0 py-0"><span class="fs-5">0</span> <span class="text-success fs-7"> In Progress</span></p>
                        </div>
                        <div class="col-md-2 col-6 ">
                            <p  class="my-0 py-0"> <span class="fs-5">0</span> <span class="text-dark fs-7">Alexandra Mclaughlin</span></p>
                        </div>
                        <div class="col-md-2 col-6 ">
                            <p  class="my-0 py-0"> <span class="fs-5">0</span> <span class="text-dark fs-7">Alexandra Mclaughlin</span></p>
                        </div>
                        <div class="col-md-2 col-6">
                            <p  class="my-0 py-0"><span class="fs-5">0</span> <span class="text-primary fs-7">  Answered</span></p>
                        </div>
                        <div class="col-md-2 col-6">
                            <p  class="my-0 py-0"><span class="fs-5">0</span> <span class="text-secondary fs-7"> On hold</span></p>
                        </div>
                    </div>
                </div>

                <div class="card ">

                    <div class="d-flex justify-content-between card-header p-3">
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
                                <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pdf</a></li>
                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                </ul>
                            </div>
                            <div class="me-2">
                                <button type="button" class="btn btn-outline-secondary bulkActions" data-bs-toggle="modal" data-bs-target="#bulkActionsModal">Bulk Actions</button>
                            </div>
                            <div class="me-2">
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class="bx bx-reset"></i></button>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mb-3">
                        <div class="table-responsive mb-3">
                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Subject</th>
                                        <th>Tags</th>
                                        <th>Department</th>
                                        <th>Service</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Last Reply</th>
                                        <th>Created_by</th>
                                        <th>Updated_by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tickets->isNotEmpty())
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td> {{ $tickets->firstItem() + $loop->index }} </td>

                                                <td>
                                                    <a href="{{ route('support.show',$ticket->id) }}">{{ $ticket->subject }}</a>
                                                </td>

                                                <td>
                                                    @php
                                                        $tagIds = explode(',', $ticket->tags);
                                                    @endphp

                                                    @foreach ($tagIds as $tagId)
                                                        @php
                                                            $tag = DB::table('tags')->where('id', $tagId)->first();
                                                        @endphp

                                                        @if ($tag)
                                                            <span class="chip chip-lg">{{ $tag->tags }}</span><br>
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @php
                                                        $departments = DB::table('departments')->where('id', $ticket->departmentid)->get();
                                                    @endphp
                                                    @if ($departments->isNotEmpty())
                                                        @foreach ($departments as $department)
                                                            {{ $department->name }}
                                                        @endforeach
                                                    @endif
                                                </td>

                                                 <td>
                                                    @php
                                                        $services = DB::table('services')->where('id', $ticket->serviceId)->get();
                                                    @endphp
                                                    @if ($services->isNotEmpty())
                                                        @foreach ($services as $service)
                                                        {{ $service->name }}
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    @php
                                                        $contacts = DB::table('contacts')->where('id', $ticket->contactid)->get();
                                                    @endphp
                                                    @if ($contacts->isNotEmpty())
                                                        @foreach ($contacts as $contact)
                                                            {{ $contact->firstname . ' ' . $contact->lastname }}
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    @php
                                                        $ticket_statuses = DB::table('ticket_statuses')->where('id', $ticket->statusId)->get();
                                                    @endphp
                                                    @if ($ticket_statuses->isNotEmpty())
                                                        @foreach ($ticket_statuses as $ticket_status)
                                                            <span class="chip chip-lg">{{ $ticket_status->name }}</span>
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    @php
                                                        $priorities = DB::table('priorities')->where('id', $ticket->priorityId)->get();
                                                    @endphp
                                                    @if ($priorities->isNotEmpty())
                                                        @foreach ($priorities as $priority)
                                                            {{ $priority->name}}
                                                        @endforeach
                                                    @endif
                                                </td>

                                                @if ($ticket->lastreply != null)
                                                    <td>{{ $ticket->lastreply }}</td>
                                                @else
                                                    <td>No Reply Yet</td>
                                                @endif

                                                <td>{{ $ticket->created_by }}</td>
                                                <td>{{ $ticket->updated_by }}</td>
                                                <td>
                                                    <a href="{{ route('support.show', $ticket->id) }}">
                                                        <span class="bx bx-show fs-5"></span>
                                                    </a>
                                                    
                                                    <a href="{{ route('support.show.settings', $ticket->id) }}">
                                                        <span class="bx bx-edit fs-5"></span>
                                                    </a>

                                                    <a href="{{ route('support.view_public_form', $ticket->id) }}">
                                                        <span class="bx bx-spreadsheet" style="font-size: 21px;"></span>
                                                    </a>

                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete">
                                                        <span class="bx bx-trash text-danger fs-5"></span>
                                                    </a>

                                                    {{-- Delete modal start --}}
                                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="text-end">
                                                                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h3>Are you sure?</h3>
                                                                    <p>Delete this data</p>
                                                                </div>
                                                                <form wire:submit.prevent="destroy">
                                                                    <div class="text-center my-4">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <a href="{{ route('support.delete_ticket',$ticket->id) }}" class="btn btn-danger">Confirm</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Delete modal start --}}

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>{{ $tickets->links('vendor.livewire.bootstrap') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')

	<!-- Multiple select -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#tags').select2({
		        placeholder: 'Select tags',
		        width: '100%',
		        dropdownParent: $('#bulkActionsModal')
		    });
		});
	</script>

    {{-- If chicked the mass delete below code will exicute  --}}
    <script>
        document.getElementById('mass_delete').addEventListener('change', function() {
            var hideDiv = document.getElementById('hideByMassDelete');
            if (this.checked) {
                hideDiv.classList.add('hidden');
            } else {
                hideDiv.classList.remove('hidden');
            }
        });
    </script>

    {{-- If chicked the Merge Tickets below code will exicute  --}}
    <script>
        document.getElementById('merge_tickets').addEventListener('change', function() {
            var showDiv = document.getElementById('oprnByMergeTickets');
            if (this.checked) {
                showDiv.style.display = 'block';

                var hideDiv = document.getElementById('hideByMassDelete');
                hideDiv.classList.add('hidden');

                var mass_check_box = document.getElementById('mass_check_box');
                mass_check_box.classList.add('hidden');

            } else {
                showDiv.style.display = 'none';
                
                var hideDiv = document.getElementById('hideByMassDelete');
                hideDiv.classList.remove('hidden');

                var mass_check_box = document.getElementById('mass_check_box');
                mass_check_box.classList.remove('hidden');
            }
        });
    </script>
@endpush



