@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

    <div class="row">
        <div class="col-md-3">
            <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
            @include('backend.partials.profile-sidebar')
        </div>
        <div class="col-md-9">
            <h4 class="mt-3 mb-3">Tickets</h4>
            <div class="card">
                <div class="card-body">
                    <div class="col mb-3">
                        <a href="{{ route('customers.profile.ticketInformation', 1) }}" type="button"
                            class="btn btn-primary px-2">+New Ticket</a>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <div class="me-2 d-flex">
                            <div class="me-2">
                                <select class="form-select" wire:model.live="size" name="size">
                                    <option value="10">10</option>
                                    <option selected value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item">Pdf</a>
                                            </li>
                                            <li><a class="dropdown-item">Excel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control"
                                        id="searchProductList" autocomplete="off" placeholder="Search Users...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Tags</th>
                                    <th>Department</th>
                                    <th>Service</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Prority</th>
                                    <th>Last Reply</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <th scope="row">{{ $ticket->id }}</th>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>{{ $ticket->tags }}</td>
                                        <td>{{ $ticket->department }}</td>
                                        <td>{{ $ticket->service }}</td>
                                        <td>{{ $ticket->contact }}</td>
                                        <td></td>
                                        <td>{{ $ticket->predefined }}</td>
                                        <td></td>
                                        <td></td>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Note Not Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
