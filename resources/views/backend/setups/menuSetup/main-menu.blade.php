@extends('backend.layouts.main')
@section('title', 'Main Menu')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="row mb-5">
    <div class="col-md-6">

        <!-- Dashboard accordion -->
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
                        <span>Dashboard</span>
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
        <div class="accordion mb-2" id="accordionExample2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
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

        <!-- Sales accordion -->
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
                        <span class="text-muted">Sales</span>
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

                                <!-- Proposals accordion -->
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
                                                <span class="text-muted">Proposals</span>
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

                                <!-- Estimates accordion -->
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
                                                <span class="text-muted">Estimates</span>
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

                                <!-- Invoices accordion -->
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
                                                <span class="text-muted">Invoices</span>
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

                                <!-- Payments accordion -->
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
                                                <span class="text-muted">Payments</span>
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

                                <!-- Credit Notes accordion -->
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
                                                <span class="text-muted">Credit Notes</span>
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

                                <!-- Items accordion -->
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
                                                <span class="text-muted">Items</span>
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

        <!-- Subscriptions accordion -->
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
                        <span class="text-muted">Customers</span>
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


        <!-- Expenses accordion -->
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
                        <span class="text-muted">Expenses</span>
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

        <!-- Contracts accordion -->
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
                        <span class="text-muted">Contracts</span>
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

        <!-- Projects accordion -->
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
                        <span class="text-muted">Projects</span>
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

        <!-- Tasks accordion -->
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
                        <span class="text-muted">Tasks</span>
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

        <!-- Support accordion -->
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
                        <span class="text-muted">Support</span>
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

        <!-- Leads accordion -->
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
                        <span class="text-muted">Leads</span>
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

        <!-- Estimate Request accordion -->
        <div class="accordion mb-2" id="accordionExample11">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEleven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
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
                <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample11">
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


        <!-- Knowledge Base accordion -->
        <div class="accordion mb-2" id="accordionExample12">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwelve">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Knowledge Base</span>
                    </button>
                </h2>
                <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample12">
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


        <!-- Utilities Base accordion -->
        <div class="accordion mb-2" id="accordionExample13">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThirteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                        <div class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                <line x1="21" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="21" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </div>
                        <span class="text-muted">Utilities</span>
                    </button>
                </h2>
                <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample13">
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

                                <!-- Media accordion -->
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
                                                <span class="text-muted">Media</span>
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

                                <!-- Bulk PDF Export accordion -->
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
                                                <span class="text-muted">Bulk PDF Export</span>
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

                                <!-- CSV Export accordion -->
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
                                                <span class="text-muted">CSV Export</span>
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

                                <!-- Calendar accordion -->
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
                                                <span class="text-muted">Calendar</span>
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

                                <!-- Announcements accordion -->
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
                                                <span class="text-muted">Announcements</span>
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

                                <!-- Activity Log accordion -->
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
                                                <span class="text-muted">Activity Log</span>
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

                                <!-- Ticket Pipe Log accordion -->
                                <div class="accordion" id="innerAccordian7">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="innerHeadingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#innerCollapseSeven" aria-expanded="false" aria-controls="innerCollapseSeven">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify text-primary" style="display: inline-block;">
                                                        <line x1="21" y1="10" x2="3" y2="10"></line>
                                                        <line x1="21" y1="6" x2="3" y2="6"></line>
                                                        <line x1="21" y1="14" x2="3" y2="14"></line>
                                                        <line x1="21" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                </div>
                                                <span class="text-muted">Ticket Pipe Log</span>
                                            </button>
                                        </h2>
                                        <div id="innerCollapseSeven" class="accordion-collapse collapse" aria-labelledby="innerHeadingSeven" data-bs-parent="#innerAccordian7">
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


        <!-- Reports Base accordion -->
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
                        <span class="text-muted">Reports</span>
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

                                <!-- Sales accordion -->
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
                                                <span class="text-muted">Sales</span>
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

                                <!-- Expenses accordion -->
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
                                                <span class="text-muted">Expenses</span>
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

                                <!-- Expenses vs Income accordion -->
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
                                                <span class="text-muted">Expenses vs Income</span>
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

                                <!-- Leads accordion -->
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
                                                <span class="text-muted">Calendar</span>
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

                                <!-- Timesheets overview accordion -->
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
                                                <span class="text-muted">Timesheets overview</span>
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

                                <!-- KB Articles accordion -->
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
                                                <span class="text-muted">KB Articles</span>
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
    </div>
</div>



@endsection


