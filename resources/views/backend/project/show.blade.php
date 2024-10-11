@extends('backend.project.project_view')
@section('project_content')
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h5 class="card-title">Project Progress 100%</h5>
                            <div class="progress" style="height:7px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Overview</h5><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span>Project #</span> <br>
                                        <span>{{ $projects->id }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span>Billing Type</span> <br>
                                        @if ($projects->billing_type == 1)
                                            <span>Fixed Rate</span>
                                        @elseif($projects->billing_type == 2)
                                            <span> Project Hours</span>
                                        @elseif($projects->billing_type == 3)
                                            <span>Task Hours</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <span>Status</span> <br>
                                        @if ($projects->status == 1)
                                            <span>Not Started</span>
                                        @elseif($projects->status == 2)
                                            <span>In Progress</span>
                                        @elseif($projects->status == 3)
                                            <span>On Hold</span>
                                        @elseif($projects->status == 4)
                                            <span>Finished</span>
                                        @elseif($projects->status == 5)
                                            <span>Cancelled</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <span>Start Date</span> <br>
                                        <span>{{ date('Y-m-d', strtotime($projects->start_date)) }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span>Total Logged Hours</span> <br>
                                        <span>00:00</span>
                                    </div>
                                    <div class="mb-3">
                                        <span>Tags</span> <br>
                                        @foreach ($projects->tagables as $tags)
                                            @php
                                                $tagIds = explode(',', $tags->tag_id);
                                                $tags = \App\Models\Tag::whereIn('id', $tagIds)->get();
                                            @endphp
                                            @foreach ($tags as $tagId)
                                                <br>
                                                <span class="badge bg-light text-black mb-1"
                                                    style="font-size:15px; font-weight: normal;">
                                                    {{ $tagId->tags }}
                                                </span>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div class="mb-3">
                                        <span>Description</span> <br>
                                        <span>{!! $projects->description !!}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span>Customer</span> <br>
                                        <span>{{ $projects->customer->company }}</span>
                                    </div>

                                    @if ($projects->billing_type == 2)
                                        <div class="mb-3">
                                            <span>Rate Per Hour</span> <br>
                                            <span>{{ $projects->project_rate_per_hour }}</span>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <span>Total Rate</span> <br>
                                            <span>{{ $projects->project_cost }}</span>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <span>Date Created</span> <br>
                                        <span>{{ date('Y-m-d', strtotime($projects->created_at)) }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span>Deadline</span> <br>
                                        <span>{{ date('Y-m-d', strtotime($projects->deadline)) }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span>Estimated Hours</span> <br>
                                        <span>{{ $projects->estimated_hours }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <span>0 / 0 Open Tasks</span>
                                </div>
                                <div class="">
                                    <span><i class="lni lni-checkmark-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="">0%</label>
                            <div class="progress mb-4" style="height:7px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body !tw-px-5 !tw-py-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="tw-mb-0 text-muted">Total Expenses</p>
                                    <p class="bold font-medium tw-mb-0">$0.00</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="tw-mb-0 text-info">Billable Expenses</p>
                                    <p class="bold font-medium tw-mb-0">$0.00</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="tw-mb-0 text-success">Billed Expenses</p>
                                    <p class="bold font-medium tw-mb-0">$0.00</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="tw-mb-0 text-danger">Unbilled Expenses</p>
                                    <p class="bold font-medium tw-mb-0">$0.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body mb-3">
                        <div class="dropdown text-end">
                            <a href="#" class="btn dropdown-toggle" id="dropdownMenuProjectLoggedTime"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                This Week
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuProjectLoggedTime">
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">Last Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">Last Month</a></li>
                            </ul>
                        </div>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
