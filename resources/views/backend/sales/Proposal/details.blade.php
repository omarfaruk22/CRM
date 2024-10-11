@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

     <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"> Proposal Detail</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Proposal Detail</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-body">

                    <div class="d-flex justify-content-between ">
                        <div class="mb-3">
                            <a href="{{ route('customers.profile.proposal.create', 1) }}" type="button"
                                class="btn btn-primary px-2">+ New Proposal</a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Switch to Pipeline!"
                                class="fadeIn animated bx bx-dots-vertical btn btn-outline-secondary px-2"
                                href ="{{ route('sales.proposals.details') }}">
                            </a>
                        </div>
                        <div class="mb-3 d-flex justify-content-end ">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="searchProductList"
                                    autocomplete="off" placeholder="Search Proposals...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-4">

                    </div>
                    <div class="row">
                        <div class="mb-1">
                            <a>Sort By: </a>
                            <a href="">Date Created |</a>
                            <a href="">Proposal Date |</a>
                            <a href="">Pipeline Order | </a>
                            <a href="">Open Till</a>
                        </div>
                        <div>
                            <div class="row">
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}
                                {{-- start single card --}}
                                <div class="card col-md-4">
                                    <div style="background-color: #A8A8A8" class="card-header">
                                        Draft - 0 Proposals
                                    </div>
                                    <div style="background-color: #e2e8f0; height:300px" class="card-body">

                                        <h5 class="card-text"> No Proposals Found</h5>

                                    </div>
                                </div>

                                {{-- end single card --}}{{-- start single card --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
