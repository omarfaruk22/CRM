@extends('backend.layouts.main')

@section('title', 'Customer Details')
@push('css')
<!--plugins-->
	{{-- <link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/> --}}
    <link href="{{asset('backend/assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/> --}}
@endpush
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3">#11 Monish Roy</h4>
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Files</h4>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
                </div>

                <div class="text-end mb-3">
					<button type="button" class="btn btn-primary px-2" >Submit</button>
				</div>

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
                        <div class="">
                            <button type="button" class="btn btn-outline-secondary">Export</button>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Users...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>File</th>
								<th>Show to customer area</th>
								<th>Uploaded Date</th>
                                <th>Option</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <td>marvin</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </div>
                                </td>
                                <td>11-23-2024</td>
                                <td>
                                    <a href="">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    <a href="">
                                        <span class="bx bx-trash text-danger fs-5"></span>
                                    </a>
                                </td>
                            </tr>
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

@push('js')
    {{-- <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script> --}}

	<script src="{{asset('backend/assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
@endpush











