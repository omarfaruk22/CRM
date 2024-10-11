@extends('backend.layouts.main')
{{-- @section('title', 'Customer Details') --}}
@section('content')
    <div class="row">
        <div>
            <div class="col-md-12 mb-3">
                <h4>Upload Module</h4>
                <p>If you have a module in a .zip format, you may install it by uploading it here.</p>
                <div class=" d-flex col-md-6">
                    <input class="form-control" type="file" id="formFile">
                    <button type="button"class=" mx-5 btn btn-primary">Install</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="me-2 d-flex">
                            <div class="me-2">
                                <select class="form-select" wire:model.live="size" name="size">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option selected value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-outline-secondary">Export</button>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control"
                                        id="searchProductList" autocomplete="off" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Module</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            Theme Style <br>
                                            <a href="" id="theme">Activate</a>
                                        </td>
                                        <td>
                                            Default module to apply additional CSS styles <br>
                                            Version 2.3.0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            Surveys <br>
                                            <a href="" id="survey">Activate</a>
                                        </td>
                                        <td>
                                            Default module for sending surveys<br>
                                            Version 2.3.0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            Menu Setup <br>
                                            <a href="" id="menuSetup">Activate</a>
                                        </td>
                                        <td>
                                            Default module to apply changes to the menus<br>
                                            Version 2.3.0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            Goals <br>
                                            <a href="" id="goal">Activate</a>
                                        </td>
                                        <td>
                                            Default module for defining goals<br>
                                            Version 2.3.0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            CSV Export Manager <br>
                                            <a href="" id="csv">Activate</a>
                                        </td>
                                        <td>
                                            Default module for Exporting data in CSV<br>
                                            Version 1.0.0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            Database Backup <br>
                                            <a href="" id="database">Activate</a>
                                        </td>
                                        <td>
                                            Default module to perform database backup<br>
                                            Version 2.3.0
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mb-4">
                                <nav>
                                    <p>Showing 1 to 6 of 6 entries
                                    </p>
                                </nav>
                                <nav aria-label="...">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item disabled"><a class="page-link" href="javascript:;"
                                                tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>

                                        <li class="page-item active" aria-current="page"><a class="page-link"
                                                href="javascript:;">1 <span class="visually-hidden">(current)</span></a>
                                        </li>

                                        <li class="page-item disabled"><a class="page-link" href="javascript:;">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.getElementById('database').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive | Datbase Backup';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
        document.getElementById('csv').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
        document.getElementById('goal').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
        document.getElementById('menuSetup').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive | Main Menu | Setup Menu';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
        document.getElementById('survey').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
        document.getElementById('theme').addEventListener('click', function(event) {
            event.preventDefault();

            var statusLink = this;
            var currentStatus = statusLink.textContent.trim();

            if (currentStatus === 'Activate') {
                statusLink.textContent = 'Disactive | Setting';
            } else {
                statusLink.textContent = 'Activate';
            }
        });
    </script>
@endpush
