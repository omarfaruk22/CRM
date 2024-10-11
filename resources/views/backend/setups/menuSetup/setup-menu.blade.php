@extends('backend.layouts.main')
@section('title', 'Setup Menu')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="row mb-5">
    <div class="col-md-6">

        <!-- Staff accordion -->
        <div class="accordion mb-2" id="accordionExample1">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span>Staff</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers accordion -->
        <div class="accordion mb-2" id="accordionExample3">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Customers</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Groups accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Groups</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support accordion -->
        <div class="accordion mb-2" id="accordionExample100">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHundred">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHundred" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Support</span>
                    </button>
                </h2>
                <div id="collapseHundred" class="accordion-collapse collapse" aria-labelledby="headingHundred" data-bs-parent="#accordionExample100">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Departments accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Departments</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Predefined Replies accordion -->
                                <div class="accordion mb-2" id="innerAccordian2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseTwo" aria-expanded="false" aria-controls="innerCollapseTwo">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Predefined Replies</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseTwo" class="accordion-collapse collapse" aria-labelledby="innerHeadingTwo" data-bs-parent="#innerAccordian2">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ticket Priority accordion -->
                                <div class="accordion mb-2" id="innerAccordian3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseThree" aria-expanded="false" aria-controls="innerCollapseThree">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Ticket Priority</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseThree" class="accordion-collapse collapse" aria-labelledby="innerHeadingThree" data-bs-parent="#innerAccordian3">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ticket Statuses accordion -->
                                <div class="accordion mb-2" id="innerAccordian4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseFour" aria-expanded="false" aria-controls="innerCollapseFour">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Ticket Statuses</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseFour" class="accordion-collapse collapse" aria-labelledby="innerHeadingFour" data-bs-parent="#innerAccordian4">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Services accordion -->
                                <div class="accordion mb-2" id="innerAccordian5">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseFive" aria-expanded="false" aria-controls="innerCollapseFive">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Services</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseFive" class="accordion-collapse collapse" aria-labelledby="innerHeadingFive" data-bs-parent="#innerAccordian5">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Spam Filters accordion -->
                                <div class="accordion mb-3" id="innerAccordian6">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseSix" aria-expanded="false" aria-controls="innerCollapseSix">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Spam Filters</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseSix" class="accordion-collapse collapse" aria-labelledby="innerHeadingSix" data-bs-parent="#innerAccordian6">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Leads accordion -->
        <div class="accordion mb-2" id="accordionExample102">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHundred2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHundred2" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Leads</span>
                    </button>
                </h2>
                <div id="collapseHundred2" class="accordion-collapse collapse" aria-labelledby="headingHundred2" data-bs-parent="#accordionExample102">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Sources accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Sources</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Statuses accordion -->
                                <div class="accordion mb-2" id="innerAccordian2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseTwo" aria-expanded="false" aria-controls="innerCollapseTwo">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Statuses</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseTwo" class="accordion-collapse collapse" aria-labelledby="innerHeadingTwo" data-bs-parent="#innerAccordian2">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Integration accordion -->
                                <div class="accordion mb-2" id="innerAccordian3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseThree" aria-expanded="false" aria-controls="innerCollapseThree">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Email Integration</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseThree" class="accordion-collapse collapse" aria-labelledby="innerHeadingThree" data-bs-parent="#innerAccordian3">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Web to Lead accordion -->
                                <div class="accordion mb-2" id="innerAccordian4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseFour" aria-expanded="false" aria-controls="innerCollapseFour">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Web to Lead</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseFour" class="accordion-collapse collapse" aria-labelledby="innerHeadingFour" data-bs-parent="#innerAccordian4">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Finance accordion -->
        <div class="accordion mb-2" id="accordionExample103">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHundred3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHundred3" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Finance</span>
                    </button>
                </h2>
                <div id="collapseHundred3" class="accordion-collapse collapse" aria-labelledby="headingHundred3" data-bs-parent="#accordionExample103">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Tax Rates accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Tax Rates</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Currencies accordion -->
                                <div class="accordion mb-2" id="innerAccordian2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseTwo" aria-expanded="false" aria-controls="innerCollapseTwo">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Currencies</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseTwo" class="accordion-collapse collapse" aria-labelledby="innerHeadingTwo" data-bs-parent="#innerAccordian2">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Modes accordion -->
                                <div class="accordion mb-2" id="innerAccordian3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseThree" aria-expanded="false" aria-controls="innerCollapseThree">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Payment Modes</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseThree" class="accordion-collapse collapse" aria-labelledby="innerHeadingThree" data-bs-parent="#innerAccordian3">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenses Categories accordion -->
                                <div class="accordion mb-2" id="innerAccordian4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseFour" aria-expanded="false" aria-controls="innerCollapseFour">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Expenses Categories</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseFour" class="accordion-collapse collapse" aria-labelledby="innerHeadingFour" data-bs-parent="#innerAccordian4">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contracts accordion -->
        <div class="accordion mb-2" id="accordionExample104">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHundred4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHundred4" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Contracts</span>
                    </button>
                </h2>
                <div id="collapseHundred4" class="accordion-collapse collapse" aria-labelledby="headingHundred4" data-bs-parent="#accordionExample104">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Contract Types accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Contract Types</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estimate Request accordion -->
        <div class="accordion mb-2" id="accordionExample105">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingHundred5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHundred5" aria-expanded="false" aria-controls="collapseThree">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Estimate Request</span>
                    </button>
                </h2>
                <div id="collapseHundred5" class="accordion-collapse collapse" aria-labelledby="headingHundred5" data-bs-parent="#accordionExample105">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Forms accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Forms</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Statuses accordion -->
                                <div class="accordion mb-2" id="innerAccordian2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseTwo" aria-expanded="false" aria-controls="innerCollapseTwo">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Statuses</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseTwo" class="accordion-collapse collapse" aria-labelledby="innerHeadingTwo" data-bs-parent="#innerAccordian2">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Modules accordion -->
        <div class="accordion mb-2" id="accordionExample4">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Modules</span>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Email Templates accordion -->
        <div class="accordion mb-2" id="accordionExample5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Email Templates</span>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample5">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Fields accordion -->
        <div class="accordion mb-2" id="accordionExample6">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Custom Fields</span>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample6">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GDPR accordion -->
        <div class="accordion mb-2" id="accordionExample7">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">GDPR</span>
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample7">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Roles accordion -->
        <div class="accordion mb-2" id="accordionExample8">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Roles</span>
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample8">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Menu Setup accordion -->
        <div class="accordion mb-2" id="accordionExample14">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFourteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Menu Setup</span>
                    </button>
                </h2>
                <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample14">
                    <div class="accordion-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabled">
                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#toggleDiv" aria-expanded="false" aria-controls="toggleDiv">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>

                        <div>
                            <div class="collapse" id="toggleDiv">

                                <!-- Main Menu accordion -->
                                <div class="accordion mb-2" id="innerAccordian1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseOne" aria-expanded="false" aria-controls="innerCollapseOne">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Main Menu</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseOne" class="accordion-collapse collapse" aria-labelledby="innerHeadingOne" data-bs-parent="#innerAccordian1">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Setup Menu accordion -->
                                <div class="accordion mb-2" id="innerAccordian2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseTwo" aria-expanded="false" aria-controls="innerCollapseTwo">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Setup Menu</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseTwo" class="accordion-collapse collapse" aria-labelledby="innerHeadingTwo" data-bs-parent="#innerAccordian2">
                                            <div class="accordion-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="disabled" required="">
                                                    <label class="form-check-label" for="disabled">Disabled?</label>
                                                </div>
                                                <div>
                                                    <label class="form-check-label" for="font_awesome">Icon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                                        <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Theme Style accordion -->
        <div class="accordion mb-2" id="accordionExample9">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Theme Style</span>
                    </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample9">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Settings accordion -->
        <div class="accordion mb-2" id="accordionExample10">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Settings</span>
                    </button>
                </h2>
                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample10">
                    <div class="accordion-body">
                        <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="disabled" required="">
							<label class="form-check-label" for="disabled">Disabled?</label>
						</div>
                        <div>
                            <label class="form-check-label" for="font_awesome">Icon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="font_awesome" placeholder="Font Awesome" value="" required="">
                                <a href="https://fontawesome.com/search" class="btn btn-outline-secondary" type="button">Font Awesome</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection










