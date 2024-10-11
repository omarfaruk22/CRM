@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')



<!-- Add Group Modal Start-->
<div class="col">
	<div class="modal fade" id="addGroupModal" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Group</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="groupName" class="form-label"><span class="text-danger">*</span> Group Name</label>
                        <input type="text" class="form-control" id="groupName" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control" id="color" value="#000000">
                            <button id="colorPickerBtn" class="btn btn-outline-secondary" type="button" style="background-color: #000000;"></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="shortDescription" class="form-label">Short Description</label>
                        <textarea class="form-control" id="shortDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" class="form-control" id="order">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="disabledCheckbox">
                            <label class="form-check-label" for="disabledCheckbox">
                                Disabled
                            </label>
                        </div>
                        <p class="text-muted">Note: All articles in this group will be hidden if disabled is checked.</p>
                    </div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Add Group Modal Start-->


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


{{-- Topbar start  --}}
<div class="row mb-3">
    <div class="d-flex justify-content-between">
        <div>
            <a href="#" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                <i class="bx bx-plus"></i> New Group
            </a>

            <a href="{{ route('knowledge_base.index') }}" id="" class="btn btn-outline-dark me-2">
                Article
            </a>
        </div>
    </div>
</div>
{{-- Topbar end  --}}


{{-- page body start  --}}
<div class="row">
    <div class="expensetable">
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
                            <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pdf</a></li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>
                        <div class="me-2">
                            <button type="button" class="btn btn-outline-secondary bulkActions" data-bs-toggle="modal" data-bs-target="#bulkActionsModal">Bulk Actions</button>
                        </div>
                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class="bx bx-reset"></i></button>
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
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Updated By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    
                                    <a href="#">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete">
                                        <span class="bx bx-trash text-danger fs-5"></span>
                                    </a>
                                    
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
                                                        <a href="#" class="btn btn-danger">Confirm</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- page body end  --}}


@endsection

@push('js')

{{-- multiple select start  --}}
<script>
	$(document).ready(function() {
	    $('#tags').select2({
	        placeholder: 'Select tags',
	        width: '100%',
	        dropdownParent: $('#bulkActionsModal')
	    });
	});
</script>
{{-- multiple select end  --}}


{{-- Text editor start  --}}
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor1')).catch(error => {
        console.error(error);
    });
</script>
{{-- Text editor end  --}}

{{-- Color picker start  --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorPicker = document.getElementById("color");
        const colorPickerBtn = document.getElementById("colorPickerBtn");
        const colorCode = document.getElementById("colorCode");

        function updateColorCode(color) {
            colorCode.value = color;
            colorPickerBtn.style.backgroundColor = color;
        }

        colorPicker.addEventListener("input", function(event) {
            updateColorCode(event.target.value);
        });

        colorPickerBtn.addEventListener("click", function() {
            colorPicker.click();
        });

        updateColorCode(colorPicker.value);
    });

    function toggleDiv() {
        var div = document.getElementById('toggleDiv');
        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            tooltipTriggerEl.addEventListener('click', function () {
                var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                tooltip.dispose();
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorPicker = document.getElementById("color");
        const colorPickerBtn = document.getElementById("colorPickerBtn");

        function updateColorCode(color) {
            colorPicker.value = color;
            colorPickerBtn.style.backgroundColor = color;
        }

        updateColorCode(colorPicker.value);

        colorPicker.addEventListener("input", function(event) {
            updateColorCode(event.target.value);
        });

        colorPickerBtn.addEventListener("click", function() {
            colorPicker.click();
        });
    });
</script>
{{-- Color picker end  --}}

@endpush
















