@extends('backend.layouts.main')
@section('title', 'Contract')
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-8 mx-auto">
            <div class="card ">
                <h5 class="card-header">Contract Information</h5>
                <div class="card-body">
                    <form class="form">
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="trashCheckbox" name="trashCheckbox" value="option1">
                              <label class="form-check-label" for="trashCheckbox"> <span style="border:1px solid black; border-radius: 50%; padding:2px 1px 0px 1px;"><i class="fadeIn animated bx bx-question-mark"></i></span> Trash </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="hideCheckbox" name="hideCheckbox" value="option2">
                              <label class="form-check-label" for="hideCheckbox">Hide from customer</label>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <label for="customerSelect"> <span class="text-danger">*</span> Customer</label>
                            <select class="form-select mb-3" id="customerSelect" name="customerSelect" aria-label="Default select example">
                              <option selected>Open this select menu</option>
                              <option value="1">One</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <label for="subjectInput"> <i class="fadeIn animated bx bx-question-mark"></i> <span class="text-danger">*</span> Subject</label>
                            <input type="text" class="form-control" id="subjectInput" name="subjectInput">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <label for="valueInput"> Contract Value</label>
                            <input type="text" class="form-control" id="valueInput" name="valueInput" value="0" min="0">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <label for="typeSelect"> Contract type</label>
                            <div class="input-group">
                              <select class="form-select mb-3" id="typeSelect" name="typeSelect" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                              </select>
                              <span>
                                <button type="button" class="btn btn-outline-secondary gnameCreateButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  +
                                </button>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="startDate">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" value="2024-05-21">
                          </div>
                          <div class="col-md-6">
                            <label for="endDate">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md">
                            <label for="descriptionTextarea">Description</label>
                            <textarea id="descriptionTextarea" class="form-control" name="descriptionTextarea"></textarea>
                          </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                      </div>
                    </form>

                </div>
            </div>
        </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Contract Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label"> <span class="text-danger">*</span> Name</label>
              <input type="text" class="form-control" id="name" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            $('.customer-checkbox').change(function () {

                var isActive = this.checked ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('customers.updatestatus', ['id' => 'id']) }}' + id,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        id: id,
                        isActive: isActive
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Status updated Successfully',
                        });
                    },
                    error: function (xhr, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this contact?");
        }


    </script>
@endpush
