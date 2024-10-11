@extends('backend.layouts.main')
@section('title', 'Customer Details')
@push('css')
<link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
                <div class="col-md-12 mb-3">
                    <h5>Add New Task</h5>
                </div>
                <hr>
              <div class="form">
                    <form action="">
                            <div class="row">
                                <div class="col-md-8 d-flex flex-wrap mb-2">
                                        <div class="mx-1 mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1"  >
                                            <label class="form-check-label" for="flexCheckChecked1">Public</label>
                                        </div>
                                        <div class="mx-1 mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                                            <label class="form-check-label" for="flexCheckChecked2">Billable</label>
                                        </div>
                                </div>
                                <div class="col-md-4 mb-2 d-flex justify-content-end">
                                    <a type="button" class="btn btn-white" data-bs-toggle="collapse" data-bs-target="#addfile" aria-expanded="false" aria-controls="collapseExample">+ Attach Files</a>
                                </div>
                                 {{-- attech file colapse  --}}
                                     <div class="collapse" id="addfile">
                                        <div class="mb-3">
                                            <label for="addfile" class="form-label">Attachment</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04"><i class='bx bx-plus' ></i></button>
                                            </div>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-outline-danger" style="width=10px;" type="button" id="inputGroupFileAddon04"><i class='bx bx-minus' ></i></button>
                                            </div>
                                        </div>
                                    </div>
                                 {{-- end colopse  --}}
                                <hr>
                                <div class="col-md-12">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Subject</label>
                                        <input type="text" class="form-control">
                                    </div>
                                     <div class="mb-3 col-md-12">
                                        <label class="form-label">Hourly Rate</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2 col-md-12">
                                                <label class="form-label">Start Date</label>
                                                <input type="date" class="form-control">
                                             </div>
                                             <div class="mb-2 col-md-12">
                                                <label class="form-label">Priority</label>
                                                    <select class="form-select "id="append-button-single-field" data-placeholder="Choose one thing">
                                                        <option>Low</option>
                                                        <option>Medium</option>
                                                        <option>Heigh</option>
                                                     </select>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2 col-md-12">
                                                <label class="form-label">Due Date</label>
                                                <input type="date" class="form-control">
                                             </div>
                                                <div class="mb-2 col-md-12">
                                                    <label class="form-label">Repeat every</label>
                                                    <select class="form-select" id="repeatSelect" data-placeholder="Choose one thing">
                                                        <option>1 week</option>
                                                        <option>1 Month</option>
                                                        <option>1 Year</option>
                                                        <option>2 Year</option>
                                                        <option value="custom">Custom</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                              {{-- custom  --}}
                                                <div class="collapse" id="custom">
                                                    <div class="mb-3">
                                                        <div class="input-group">
                                                             <input type="number" id="tt" name="tt" class="form-control" value="" aria-invalid="false">
                                                        </div>
                                                        <div class="input-group mt-2">
                                                             <select class="form-select "id="append-button-single-field" data-placeholder="Choose one thing">
                                                                    <option>Select plan</option>
                                                                    <option>Weekly</option>
                                                                    <option>Monthly</option>
                                                                    <option>Monthly</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end custom  --}}
                                            </div>{{-- <div class="mb-2 col-md-12">
                                                <label class="form-label">Total Cycles</label>
                                                          <div class="input-group">
                                                             <input type="number" id="tt" name="tt" class="form-control" >
                                                        </div>
                                             </div> --}}
                                     
                                        <div class="col-md-6">
                                                <div class="mb-2 col-md-12">
                                                    <label class="form-label">Releted to</label>
                                                    <select class="form-select" id="repeatSelect" data-placeholder="Choose one thing">
                                                        <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                    </select>
                                                </div>
                                                 <div class="mb-2 col-md-12">
                                                    <label class="form-label">Assignees</label>
                                                    <select class="form-select" id="assignee" multiple data-placeholder="Choose one thing">
                                                        <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                    </select>
                                                </div>
                                        </div>
                                           <div class="col-md-6">
                                            <div class="mb-2 col-md-12">
                                                    <label class="form-label">Customer</label>
                                                    <select class="form-select" id="repeatSelect" data-placeholder="Choose one thing">
                                                        <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                         <option>Project</option>
                                                        <option>Invoice</option>
                                                        <option>customer</option>
                                                    </select>
                                                </div>
                                                 <div class="mb-2 col-md-12">
                                                 <label class="form-label">Followers</label>
                                                    <select class="form-select select2" multiple id="select2" data-placeholder="Choose one thing">
                                                        <option>Select Items</option>
                                                        <option>Reactive</option>
                                                        <option>Solution</option>
                                                        <option>Conglomeration</option>
                                                        <option>Algorithm</option>
                                                        <option>Holistic</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                             
                                               	<div class="col-md-12 mb-3">
                                                    <label class="form-label">Tags</label>
                                                    <select multiple data-role="tagsinput" >
                                                        <option value="Amsterdam">Amsterdam</option>
                                                    </select>
                                                </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="description" class="form-label">Description:</label>
                                                        <textarea id="taskeditor" class="form-control" rows="4"></textarea>
                                                    </div>
                                         </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 text-end">
                                 <a href="#" type="button" class="btn btn-primary">Save</a>
                            </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  $('#select2').select2({
      theme: 'default', // or another theme you are using
  });
   $('#assignee').select2({
      theme: 'default', // or another theme you are using
  });
});
</script>
<script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
{{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#taskeditor'))
        .catch(error => {
            console.error(error);
        });
	</script>
<script>
    // JavaScript to handle custom option selection
    document.getElementById('repeatSelect').addEventListener('change', function() {
        var customSection = document.getElementById('custom');
        if (this.value === 'custom') {
            customSection.classList.add('show');
        } else {
            customSection.classList.remove('show');
        }
    });
</script>
@endpush
