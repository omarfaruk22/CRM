@extends('backend.layouts.main')
@section('title', 'Add new predefined reply')

@section('content')
	<div class="row">
		<div class="col-xl-9 mx-auto">
            <h5 class="mb-0">Add new predefined reply </h5>
			<div class="card mt-3">
				<div class="card-body p-4">

					
					<form action="{{ route('support.pre_reply.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
						@csrf

						<div class="col-md-12">
							<label for="name" class="form-label"><span style="color: red">*</span> Predefined Reply Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Predefined Reply Name">
							@error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
						</div>

						<div class="col-md-12">
							<label for="message" class="form-label">Description</label>
							<textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" placeholder="Description ..." rows="5"></textarea>
							@error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
						</div>

						<div class="col-md-12">
							<div class="d-md-flex d-grid align-items-center gap-3">
								<button type="submit" class="btn btn-primary px-4">Save</button>
							</div>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
@endsection












