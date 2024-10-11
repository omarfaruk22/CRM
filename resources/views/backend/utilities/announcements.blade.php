@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Annoucement</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Announcement Drop</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
                     
                <div class="row">
                 
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{ route('estimate.edit') }}" class="btn btn-primary me-2 mb-3">
                                <i class="bx bx-plus"></i> New Announcement
                            </a>
                            {{-- <button id="toggleButton" class="btn btn-outline-dark me-2 mb-3">
                                <i class="fadeIn animated bx bx-filter"></i>
                            </button> --}}
                            <button id="supportButton" class="btn btn-outline-dark me-2 mb-3">
                                <i class='bx bx-slider'></i> Group
                            </button>
                
                            <button id="supportButton" class="btn btn-outline-dark me-2 mb-3">
                                <i class="fadeIn animated bx bx-filter"></i>
                            </button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-outline-dark btn-sm mb-3" id="toggleBtn" onclick="toggleDiv()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
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
                            {{-- <div class="row chart-section" style="display:none;">
                                <div style="width:100%; height:300px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div> --}}
                
                            {{-- <div class="row chart-section" style="display:none; transition: all 1s ease;">
                                <div style="width:100%; height:300px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div> --}}
                
                            <div class="row chart-section" style="display:none;">
                                <div style="width:100%; height:300px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                
                
                
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
                                            <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                            <ul class='dropdown-menu'>
                                                <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                                <li><a class='dropdown-item' href='#'>Excel</a></li>
                                            </ul>
                                        </div>
                
                                         <!-- Adding Bulk Actions button -->
                                         {{-- <button class="btn btn-outline-secondary me-2" type="button">Bulk Actions</button> --}}
                                       
                                          <style>
                                            .modal-dialog {
                                              max-width: 40% !important;  /* Change this to your desired width */
                                            }
                                          </style>
                
                
                                       
                
                                        <!-- Adding Reset button -->
                                        <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
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
                                                <th scope="col">Sl NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>May day</td>
                                                <td>29  May 2024</td>
                                                
                                            </tr>
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


<script>
   
    {{-- Tooltips start  --}}
    <script>
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
