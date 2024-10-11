@extends('backend.layouts.main')
@section('title', 'Leads')
@section('content')

    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">


                <a href="{{ route('leads.import') }}" class="btn btn-primary me-2 mb-3">
                    <i class='bx bx-cloud-upload'></i>Import Leads
                </a>



                <button id="leadsSummary" class="btn btn-outline-dark me-2 mb-3 leadsSummary" type='button'
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Lead Summary">
                    <i class='bx bx-food-menu'></i>
                </button>
                <a href="{{ route('leads.swapkanban') }}" id="leadsKanban" class="btn btn-outline-dark me-2 mb-3"
                    type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Switch to Kanban">
                    <i class='bx bxs-dashboard'></i>
                </a>

            </div>
            <div class="">
                <div class="d-flex align-items-center">
                    <!-- Search Box -->
                    <input type="text" class="form-control mx-3" id="searchBox" placeholder="Search Leads"
                        style="width: 200px;">

                    <!-- Toggle Button -->
                    <button type="button" class="btn btn-outline-dark btn-sm mr-3" id="toggleBtn" onclick="toggleDiv()"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
                        <i class="bx bx-filter-alt m-0"></i>
                    </button>

                    <!-- Toggle Div -->
                    <div id="toggleDiv" class="card" style="display: none; z-index: 9999;">
                        <div class="card-body">
                            <div><a href="#">New Filter</a></div>
                            <p class="card-text">No saved filters, get started by creating a new filter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="d-flex align-items-center fs-5">
            <p class="mb-0 me-2">Sort By :</p>
            <a href="#" class="me-2"> Date Created <i class='bx bx-down-arrow-alt'></i> <i
                    class='bx bx-up-arrow-alt'></i> | </a>
            <a href="#" class="me-2">Kanban Order <i class='bx bx-down-arrow-alt'></i><i
                    class='bx bx-up-arrow-alt'></i>| </a>
            <a href="#"> Last Contact <i class='bx bx-down-arrow-alt'></i> <i class='bx bx-up-arrow-alt'></i> </a>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row overflow-auto-x">
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> John Doe
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> john.doe@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +123456789
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat this block for additional cards -->
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> Jane Smith
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> jane.smith@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +987654321
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repeat this block for additional cards -->
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> Jane Smith
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> jane.smith@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +987654321
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repeat this block for additional cards -->
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> Jane Smith
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> jane.smith@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +987654321
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat this block for additional cards -->
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> Jane Smith
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> jane.smith@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +987654321
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat this block for additional cards -->
            <div class="col-md-4 mb-4">
                <div class="card rounded-3">
                    <div class="card-header bg-primary text-white">
                        Card Title
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Name:</strong> Jane Smith
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> jane.smith@example.com
                        </div>
                        <div>
                            <strong>Phone:</strong> +987654321
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of card block -->
        </div>
    </div>

@endsection
