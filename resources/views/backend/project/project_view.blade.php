@extends('backend.layouts.main')
@section('title', 'Project Details')

@push('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style>
        .closebtn {
            display: none;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
        }

        .chip:hover .closebtn {
            display: block;
        }
    </style>
    <style>
        .scroll-menu-container {
            position: relative;
        }

        .scroll-menu {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
            margin-left: 30px;
            margin-right: 30px;

        }

        .scroll-menu::-webkit-scrollbar {
            display: none;
        }

        .scroll-menu-item {
            display: inline-block;
            margin-right: 5px;
        }

        .arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            color: rgb(29, 27, 27);
            padding: 10px;
            cursor: pointer;
            z-index: 1;
            display: none;
        }

        .arrow-left {
            font-size: 22px;
            left: 0;
        }

        .arrow-right {
            font-size: 22px;
            right: 0;
        }
    </style>
@endpush

@section('content')

    {{-- Remove Project member modal start  --}}
    <div class="modal fade" id="removeProjectMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Project Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to perform this action?</p>
                </div>
                <form wire:submit.prevent="destroy">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="closeModal">Cancel</button>
                        <button type="submit" class="btn btn-danger">ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Remove Project member modal end  --}}


    {{-- Add project member modal start --}}
    <div class="modal fade" id="addProjectMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Project Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="members" class="form-label">Members</label><br>
                    <select id="members" name="members[]" class="form-select" multiple="multiple">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Add project member modal end --}}
    {{-- Invoice Project modal start   --}}
    <div class="col">
        <div class="modal fade" id="invoiceProjectModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invoice Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-4">

                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" checked name="invoice_data_type"
                                                value="single_line" id="single_line">
                                            <label class="form-check-label" for="single_line">Single line [ Fixed Rate
                                                ]</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="invoice_data_type" disabled
                                                value="task_per_item" id="task_per_item">
                                            <label class="form-check-label" for="task_per_item">Task per item</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="invoice_data_type" disabled
                                                value="timesheets_individualy" id="timesheets_individualy">
                                            <label class="form-check-label" for="timesheets_individualy">All timesheets
                                                individually</label>
                                        </div>
                                    </div>

                                </div>
                                <p class="text-danger mt-4">No tasks to bill. Feel free to add whatever you want in the
                                    invoice items.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Invoice Project</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Invoice Project modal start   --}}



    <div class="d-flex justify-content-between">
        <div class="">
            <div class="row">
                <div class="col mb-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Project Name - Customer</button>
                        <ul class="dropdown-menu" style="">
                            <li><a class="dropdown-item" href="#">Project Name - Customer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex ">
                    <div class="chip position-relative text-danger" data-bs-toggle="modal"
                        data-bs-target="#removeProjectMemberModal" onmouseover="showCloseIcon(this)"
                        onmouseout="hideCloseIcon(this)">
                        <img src="{{ asset('storage/users/Screenshot from 2024-04-25 15-56-02.png') }}" alt="">
                        <span class="position-absolute top-0 end-0 closebtn me-2" onclick="removeChip(this)"
                            style="display: none;">×</span>
                    </div>
                    <div class="chip" data-bs-toggle="modal" data-bs-target="#addProjectMemberModal">
                        <i class="lni lni-arrow-right-circle"></i>
                    </div>
                    <div class="chip">
                        <span class="text-truncate">Not Started</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="d-flex">
                <a type="button" href="{{ route('tasks.create', ['id' => $projects->id, 'rel_type' => 'project']) }}"
                    class="btn btn-primary px-2 me-2"><i class="lni lni-circle-plus"></i> New
                    Task</a>
                <button type="button" class="btn btn-primary px-2 me-2" data-bs-toggle="modal"
                    data-bs-target="#invoiceProjectModal"><i class="fadeIn animated bx bx-spreadsheet"></i> Invoice
                    Project</button>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle " type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">More</button><br>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="#">Pin Project</a></li>
                        <li><a class="dropdown-item" href="#">Edit Project</a></li>
                        <li><a class="dropdown-item" href="#">Copy Project</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="#">Mark as In Progress</a></li>
                        <li><a class="dropdown-item" href="#">Mark as On Hold</a></li>
                        <li><a class="dropdown-item" href="#">Mark as Cancelled</a></li>
                        <li><a class="dropdown-item" href="#">Mark as Finished</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="#">Export Project Data</a></li>
                        <li><a class="dropdown-item" href="#">View Project as Customer</a></li>
                        <li><a class="dropdown-item" href="#">Delete Project</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body ">

            <div class="container">
                <div class="scroll-menu-container">
                    <a class="arrow-btn btn arrow-left">&lt;</a>
                    <div class="scroll-menu ">
                        <ul class="mb-0 ">
                            <li class="scroll-menu-item "><a href="{{ route('projects.show', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.show') ? 'active' : '' }}">Overview</a>
                            </li>
                            <li class="scroll-menu-item"><a href="{{ route('projects.project_task', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_task') ? 'active' : '' }}">Tasks</a>
                            </li>
                            <li class="scroll-menu-item"><a
                                    href="{{ route('projects.project_timesheets', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_timesheets') ? 'active' : '' }}">Timesheets</a>
                            </li>
                            <li class="scroll-menu-item"><a
                                    href="{{ route('projects.project_milestones', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_milestones') ? 'active' : '' }}">Milestones</a>
                            </li>
                            <li class="scroll-menu-item"><a href="{{ route('projects.project_files', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_files') ? 'active' : '' }}">File</a>
                            </li>
                            <li class="scroll-menu-item"><a
                                    href="{{ route('projects.project_discussions', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_discussions') ? 'active' : '' }}">Discussions</a>
                            </li>
                            <li class="scroll-menu-item"><a href="{{ route('projects.project_gantt', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_gantt') ? 'active' : '' }}">Gantt</a>
                            </li>
                            <li class="scroll-menu-item"><a href="{{ route('projects.project_tickets', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_tickets') ? 'active' : '' }}">Tickets</a>
                            </li>
                            <li class="scroll-menu-item"><a
                                    href="{{ route('projects.project_contracts', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_contracts') ? 'active' : '' }}">Contracts</a>
                            </li>
                            <li class="scroll-menu-item">
                                <a class="btn btn-light dropdown-toggle {{ request()->routeIs('projects.project_proposals') || request()->routeIs('projects.project_estimates') || request()->routeIs('projects.project_invoices') || request()->routeIs('projects.project_subscriptions') || request()->routeIs('projects.project_expenses') || request()->routeIs('projects.project_credit_notes') ? 'active' : '' }}"
                                    type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sales
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_proposals') ? 'active' : '' }}"
                                            href="{{ route('projects.project_proposals', $projects->id) }}"
                                            type="button">Proposals</a></li>
                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_estimates') ? 'active' : '' }}"
                                            href="{{ route('projects.project_estimates', $projects->id) }}"
                                            type="button">Estimates</a></li>
                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_invoices') ? 'active' : '' }}"
                                            href="{{ route('projects.project_invoices', $projects->id) }}"
                                            type="button">Invoices</a></li>
                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_subscriptions') ? 'active' : '' }}"
                                            href="{{ route('projects.project_subscriptions', $projects->id) }}"
                                            type="button">Subscriptions</a></li>
                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_expenses') ? 'active' : '' }}"
                                            href="{{ route('projects.project_expenses', $projects->id) }}"
                                            type="button">Expenses</a></li>
                                    <li><a class="dropdown-item {{ request()->routeIs('projects.project_credit_notes') ? 'active' : '' }}"
                                            href="{{ route('projects.project_credit_notes', $projects->id) }}"
                                            type="button">Credit Notes</a></li>
                                </ul>
                            </li>
                            <li class="scroll-menu-item"><a href="{{ route('projects.project_notes', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_notes') ? 'active' : '' }}">Notes</a>
                            </li>
                            <li class="scroll-menu-item"><a
                                    href="{{ route('projects.project_activity', $projects->id) }}"
                                    class="btn btn-light {{ request()->routeIs('projects.project_activity') ? 'active' : '' }}">Activity</a>
                            </li>
                        </ul>
                    </div>
                    <a class="arrow-btn btn arrow-right">&gt;</a>
                </div>

            </div>

        </div>
    </div>


    @yield('project_content')

@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('#members').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#addProjectMemberModal')
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const options = {
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#addNewTaskModal')
            };

            $('#assignees').select2(options);
            $('#followers').select2(options);
            $('#tags').select2(options);
        });
    </script>
    <script>
        $(document).ready(function() {
            const options = {
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#addProjecttimesheet')
            };

            $('#tagss').select2(options);
            $('#task').select2(options);
            $('#member').select2(options);

            const editoptions = {
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#editProjecttimesheet')
            };

            $('#edittagss').select2(editoptions);
            $('#edittask').select2(editoptions);
            $('#editmember').select2(editoptions);
        });
    </script>


    {{-- text editor  --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#task_description'))
            .catch(error => {
                console.error(error);
            });
    </script>


    {{-- Chart start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        var labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
            "November", "December"
        ];
        var data = [65, 59, 80, 81, 56, 65, 59, 80, 81, 56, 81, 56];
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Logged Hours',
                    data: data,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    {{-- Chart end  --}}


    <script>
        function showCloseIcon(element) {
            element.querySelector('.closebtn').style.display = 'block';
        }

        function hideCloseIcon(element) {
            element.querySelector('.closebtn').style.display = 'none';
        }

        function removeChip(closeBtn) {
            closeBtn.parentElement.style.display = 'none';
        }
    </script>
    <script>
        const scrollMenu = document.querySelector('.scroll-menu');
        const arrowLeft = document.querySelector('.arrow-left');
        const arrowRight = document.querySelector('.arrow-right');
        const activeButton = document.querySelector('.scroll-menu .btn.active');

        function checkOverflow() {
            if (scrollMenu.scrollWidth > scrollMenu.clientWidth) {
                arrowLeft.style.display = 'block';
                arrowRight.style.display = 'block';
            } else {
                arrowLeft.style.display = 'none';
                arrowRight.style.display = 'none';
            }
        }

        function scrollToActive() {
            if (activeButton) {
                activeButton.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'center'
                });
            }
        }

        checkOverflow();
        scrollToActive();

        window.addEventListener('resize', () => {
            checkOverflow();
            scrollToActive();
        });

        arrowLeft.addEventListener('click', () => {
            scrollMenu.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        arrowRight.addEventListener('click', () => {
            scrollMenu.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });
    </script>
@endpush
