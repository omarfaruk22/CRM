@extends('backend.layouts.main')
@section('title', 'Edit predefined reply ')
@section('content')

	<div class="row">
		<div class="col-xl-9 mx-auto">

            <div class="d-flex justify-content-between"> 
                <h5 class="mb-0">Edit predefined reply </h5>
                <a href="{{ route('support.pre_reply.create') }}" type="button" class="btn btn-primary px-2">+ New Predefined Reply</a>
            </div>
           
			<div class="card mt-3">
				<div class="card-body p-4">
					
					<form action="{{ route('support.pre_reply.update', $predefinedreply->id) }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
						@csrf
						@method('PATCH')

						<div class="col-md-12">
							<label for="name" class="form-label"><span style="color: red">*</span> Predefined Reply Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $predefinedreply->name }}">
							@error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
						</div>

						<div class="col-md-12">
							<label for="message" class="form-label">Description</label>
							<textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="5">{{ $predefinedreply->message }}</textarea>
							@error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
						</div>

						<div class="col-md-12">
							<div class="d-md-flex d-grid align-items-center gap-3">
								<button type="submit" class="btn btn-primary px-4">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection













