@extends('backend.project.project_view')
@section('project_content')
    @push('css')
        <link href="{{ asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
    @endpush
    <div class="card-body">
        <form action="{{ route('projects.project_files.store') }}" id="project_file_form" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden"value="{{ $projects->id }}" name="project_id" id="projectId">
            <div class="col-md-12 py-2">
                {{-- <div class="col-md-9 mx-auto">


                    <input id="image-uploadify" type="file" name="project_file[]"
                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple=""
                        style="display: none;">
                    <div class="imageuploadify well">
                        <div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div>
                        <div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span
                                class="imageuploadify-message">Drag&amp;Drop Your File(s)Here To
                                Upload</span><button type="button" class="btn btn-default"
                                style="background: white; color: rgb(58, 160, 255);">or select file to
                                upload</button></div>
                    </div>

                </div> --}}
                <input type="file" class="form-control" name="project_file" id="project_file">
            </div>

            {{-- <input id="project_file" type="file" name="project_file[]" multiple class="ff_fileupload_hidden"> --}}
            <div class="col-md-12 py-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="visible_to_customer" role="switch"
                        id="visible_to_customer" checked="" value="1">
                    <label class="form-check-label" for="visible_to_customer">Visible to Customer</label>
                </div>
            </div>
            <div class="text-end p-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>


    {{-- table Start --}}
    <div>
        {{-- Delete  modal start --}}
        @include('livewire.modal')
        {{-- Delete  modal end --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class=" card-body">
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
                                    <!-- Adding Reset button -->
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reload">Bulk Action</button>
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Reload">Download All</button>
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
                                            <th scope="col">FileName</th>
                                            <th scope="col">File type</th>
                                            <th scope="col">Last Activity</th>
                                            <th scope="col">Total Comments</th>
                                            <th scope="col">Visible to Customer</th>
                                            <th scope="col">Uploaded by</th>
                                            <th scope="col">Date uploaded</th>
                                            <th scope="col">Actions</th> <!-- Added action column header -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projectfiles as $projectfile)
                                            <tr>
                                                <td>{{ $projectfile->file_name }}</td>
                                                <td>{{ $projectfile->filetype }}</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault1"
                                                            {{ $projectfile->visible_to_customer == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>{{ $projectfile->created_by }}</td>
                                                <td>{{ $projectfile->created_at }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#editProjectmilestone">
                                                        <span class="bx bx-edit fs-5"></span>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete">
                                                        <span class="bx bx-trash text-danger fs-5"></span>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })
    </script> --}}
@endpush
