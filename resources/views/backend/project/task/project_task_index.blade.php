@extends('backend.project.project_view')
@section('project_content')
    <div class="row">

        <div class="d-flex justify-content-between mb-3">

            <div class="">
                <a href="{{ route('tasks.create', ['id' => $projects->id, 'rel_type' => 'project']) }}"
                    class="btn btn-primary">
                    <i class="bx bx-plus"></i>
                    New Task
                </a>
                <a href="#" class="btn btn-outline-dark ">
                    <i class='bx bx-grid'></i>
                </a>
            </div>

            <div class="">
                <a href="{{ route('maintasks.overview') }}" class="btn btn-outline-primary ">
                    <i class="bx bx-plus"></i>
                    Task Overview
                </a>
                <a href="" class="btn btn-outline-dark ">
                    <i class='bx bx-filter-alt m-0'></i>
                </a>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5> <i class='bx bxs-collection'></i> Tasks Summary</h5>
                </div>
                <div class="card-body">
                    <div class="status-row mt-4">
                        <div class="status-item d-flex flex-column align-items-start">
                            <p class="mb-0">
                                <span class="fs-5">0</span>
                                <span class="text-secondary fs-7 hov">Not started</span>
                            </p>
                            <p class="mb-0">
                                <span class="text-secondary">Tasks assigned to me:</span>
                                <span class="text-info fs-7 hov">0</span>
                            </p>
                        </div>



                        <div class="status-item d-flex flex-column align-items-start">
                            <p class="mb-0">
                                <span class="fs-5">0</span>
                                <span class="text-info fs-7 hov ">In Progress</span>
                            </p>
                            <p class="mb-0">
                                <span class="text-secondary">Tasks assigned to me:</span>
                                <span class="text-info fs-7 hov">0</span>
                            </p>
                        </div>

                        <div class="status-item d-flex flex-column align-items-start">
                            <p class="mb-0">
                                <span class="fs-5">0</span>
                                <span class="text-info fs-7 hov">Testing</span>
                            </p>
                            <p class="mb-0">
                                <span class="text-secondary">Tasks assigned to me:</span>
                                <span class="text-info fs-7 hov">0</span>
                            </p>
                        </div>

                        <div class="status-item d-flex flex-column align-items-start">
                            <p class="mb-0">
                                <span class="fs-5">0</span>
                                <span class=" fs-7 hov text-warning">Awaiting Feedback</span>
                            </p>
                            <p class="mb-0">
                                <span class="text-secondary">Tasks assigned to me:</span>
                                <span class="text-info fs-7 hov">0</span>
                            </p>
                        </div>

                        <div class="status-item d-flex flex-column align-items-start">
                            <p class="mb-0">
                                <span class="fs-5">0</span>
                                <span class=" fs-7 hov text-success">Complete</span>
                            </p>
                            <p class="mb-0">
                                <span class="text-secondary">Tasks assigned to me:</span>
                                <span class="text-info fs-7 hov">0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- table Start --}}
    <livewire:backend.project.project-task :mainproject_id="$projects->id">
    @endsection
