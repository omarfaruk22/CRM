@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')


    {{-- Copy modal start  --}}
    <div class="col">
        <div class="modal fade" id="copy" tabindex="-1" aria-labelledby="copyLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="copyLabel">Copy Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" class="copy" name="tasks" id="c_tasks" checked="">
                                    <label for="c_tasks">Tasks</label>
                                </div>
                                <div class="checkbox checkbox-primary mleft10 tasks-copy-option">
                                    <input type="checkbox" name="tasks_include_checklist_items"
                                        id="tasks_include_checklist_items" checked="">
                                    <label for="tasks_include_checklist_items"><small>Copy checklist items</small></label>
                                </div>
                                <div class="checkbox checkbox-primary mleft10 tasks-copy-option">
                                    <input type="checkbox" name="task_include_assignees" id="task_include_assignees"
                                        checked="">
                                    <label for="task_include_assignees"><small>Copy the same assignees</small></label>
                                </div>
                                <div class="checkbox checkbox-primary mleft10 tasks-copy-option">
                                    <input type="checkbox" name="task_include_followers"
                                        id="copy_project_task_include_followers" checked="">
                                    <label for="copy_project_task_include_followers"><small>Copy the same
                                            followers</small></label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" name="milestones" id="c_milestones" checked="">
                                    <label for="c_milestones">Milestones</label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" name="members" id="c_members" class="copy" checked="">
                                    <label for="c_members">Members</label>
                                </div>

                                <hr>

                                <div class="copy-project-tasks-status-wrapper">
                                    <p class="bold">Tasks Status</p>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="copy_project_task_status" value="1"
                                            id="cp_task_status_1" checked="">
                                        <label for="cp_task_status_1">Not Started</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="copy_project_task_status" value="4"
                                            id="cp_task_status_4">
                                        <label for="cp_task_status_4">In Progress</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="copy_project_task_status" value="3"
                                            id="cp_task_status_3">
                                        <label for="cp_task_status_3">Testing</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="copy_project_task_status" value="2"
                                            id="cp_task_status_2">
                                        <label for="cp_task_status_2">Awaiting Feedback</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="copy_project_task_status" value="5"
                                            id="cp_task_status_5">
                                        <label for="cp_task_status_5">Complete</label>
                                    </div>
                                    <hr>
                                </div>

                                <div class="form-group mb-3" app-field-wrapper="name">
                                    <label for="name" class="control-label"> <small class="req text-danger">*
                                        </small>Project Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="clientid_copy_project"> <small class="req text-danger">*
                                        </small>Customer</label>
                                    <select class="form-select" id="single-select-field"
                                        data-placeholder="Choose one thing">
                                        <option></option>
                                        <option>Reactive</option>
                                        <option>Solution</option>
                                        <option>Conglomeration</option>
                                        <option>Algoritm</option>
                                        <option>Holistic</option>
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group" app-field-wrapper="start_date">
                                            <label for="start_date" class="control-label"> <small
                                                    class="req text-danger">* </small>Start Date</label>
                                            <div class="input-group date">
                                                <input type="text" id="start_date" name="start_date"
                                                    class="form-control datepicker" value="2024-05-07"
                                                    autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa-regular fa-calendar calendar-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" app-field-wrapper="deadline">
                                            <label for="deadline" class="control-label">Deadline</label>
                                            <div class="input-group date">
                                                <input type="text" id="deadline" name="deadline"
                                                    class="form-control datepicker" value="" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa-regular fa-calendar calendar-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Copy Project</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Copy modal end  --}}



    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">
                <a href="{{ route('projects.create') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i> New Project
                </a>
                <a href="{{ route('projects.filter') }}" class="btn btn-outline-dark me-2 mb-3">
                    <i class="fadeIn animated bx bx-filter"></i>
                </a>
            </div>
            <div class="">
                <button type="button" class="btn btn-outline-dark btn-sm mb-3" id="toggleBtn" onclick="toggleDiv()"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
                    <i class="bx bx-filter-alt m-0"></i>
                </button>
                <div id="toggleDiv" class="card" style="display: none; z-index: 9999;">
                    <div class="card-body">
                        <div><a href="#">New Filter</a></div>
                        <p class="card-text">No saved filters, get started by creating a new filter.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="mt-3">Project Summary</h5>
                    <div class="row mt-4">

                        <div class="col-md-2 col-6">
                            <h6>0 Not Started</h6>
                        </div>

                        <div class="col-md-2 col-6">
                            <h6 class="text-primary">0 In Progress</h6>
                        </div>

                        <div class="col-md-2 col-6">
                            <h6 class="text-warning">0 On Hold</h6>
                        </div>

                        <div class="col-md-2 col-6">
                            <h6 class="text-secondary">0 Cancelled</h6>
                        </div>

                        <div class="col-md-2 col-6">
                            <h6 class="text-success">0 Finished</h6>
                        </div>

                    </div>
                </div>


                <div class="card-body">
                    {{-- table Start --}}
                    <livewire:backend.project.indexproject>

                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@push('js')
    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function() {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
        function toggleDiv() {
            var div = document.getElementById('toggleDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    </script>
    {{-- Tooltips end  --}}
@endpush
