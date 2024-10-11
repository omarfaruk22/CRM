@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')


<div class="col">
    <!-- Modal -->
  {{-- THIS IS EDIT MODAL  --}}
<div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <div class="me-3">
                        <img class="rounded-circle img-thumbnail" style="height:45px;" src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" >
                    </div>
                    <div class="">
                        <h6 class="modal-title">Modal title</h6>
                        <p>Eichmann Ltd</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 

                <div class="form">
                    <form id="pupdateform" action="" method="post">
                         @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12 ">
                                <label class="form-label">Profile Image:</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>
                            <input type="hidden" id="contact_id" name="contact_id">
                            <input type="hidden" id="customer_id" >
                            <div class="mb-3 col-md-6">
                                <label class="form-label"><span style="color: red">*</span> First Name:</label>
                                <input type="text" name="firstname" id="first_name" value="" placeholder="Enter your First Name"  class="form-control first_name" >
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label"><span style="color: red">*</span> Last Name:</label>
                                <input type="text" name="lastname" id="last_name" value="" placeholder="Enter your Last Name"  class="form-control last_name" >
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Position:</label>
                                <input type="text" name="title" id="e_position" placeholder="Enter your Position"  class="form-control e_position">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label"><span style="color: red">*</span> Email:</label>
                                <input type="email" name="email" id="e_email" placeholder="Enter your Email"  class="form-control e_email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone:</label>
                                <input type="text" name="phonenumber" id="e_phone" placeholder="Enter your Number" class="form-control e_phone">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Direction:</label>
                                <select class="form-select e_direction" name="direction" id="e_direction" aria-label=" select example">
                                    <option >System Default</option>
                                    <option value="LTR">LTR</option>
                                    <option value="RTL">RTL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label"><span style="color: red">*</span> Password:</label>
                                    <div class="input-group">
                                <input type="text" name="password" id="e_password" class="form-control e_password" aria-label="Dollar amount (with dot and two decimal places)"> <span class="input-group-text"><i class="bx bx-show-alt"></i></span>
                                <span class="input-group-text"><i class="bx bx-refresh"></i></span>
                            </div>
                                <small>Note: if you populate this field, password will be changed on this contact.</small>
                            </div>
                            <hr>
                            <div class="mb-3 col-md-6">
                                <input class="form-check-input eprimary" name="is_primary" type="checkbox" value="1" id="eprimary" checked="">
                                <label class="form-check-label" for="eprimary">Primary Contact</label>
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                                <label class="form-check-label" for="flexCheckChecked">Send set Password Email </label>
                            </div> --}}
                            <hr>
                            <div class="mb-3 col-md-6">
                                <h5 class="form-label">Permissions</h5>
                                <small class="text-danger">Make sure to set appropriate permissions for this contact</small>
                            </div>
                            <div class="row">
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level"  for="pinvoice">Invoices</label>
                                </div>
                                    <div class="mb-1 col-md-9">
                                    <input class="form-check-input pinvoice"  name="pinvoice" value="1"  type="checkbox" id="pinvoice" checked="">
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="pestimate">Estimates</label>
                                </div>
                                    <div class="mb-1 col-md-9">
                                    <input class="form-check-input pestimate"  name="pestimate" value="2"  type="checkbox" id="pestimate" checked="">
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="pcontract">Contracts</label>
                                </div>
                                    <div class="mb-1 col-md-9">
                                    <input class="form-check-input pcontract" type="checkbox"  name="pcontract" value="3"  id="pcontract" checked="">
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="pproposal">Proposals</label>
                                </div>
                                    <div class="mb-1 col-md-9">
                                    <input class="form-check-input pproposal" type="checkbox"  name="pproposal" value="4"   id="pproposal" checked="">
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="psupport">Support</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input psupport" type="checkbox" name="psupport" value="5"  id="psupport" checked="">
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="pproject">Projects</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pproject" type="checkbox"  name="pproject" value="6"   id="pproject" checked="">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 col-md-6">
                                <h5 class="form-label">Email Notifications</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="einvoice">Invoices</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input einvoice" name="invoice_emails" type="checkbox" id="einvoice" checked="">
                                        </div>
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level " for="ecreditnote">Credit Note</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input ecreditnote" type="checkbox" name="credit_note_emails" id="ecreditnote" checked="">
                                        </div>
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="eticket">Tickets</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input eticket" type="checkbox" name="ticket_emails" id="eticket" checked="">
                                        </div>
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="etask"> Task</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input etask" type="checkbox" name="task_emails" id="etask" checked="">
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="row">
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="eestimate">Estimate</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input eestimate" type="checkbox" name="estimate_emails" id="eestimate" checked="">
                                        </div>
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="eproject">Project</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input eproject" type="checkbox" name="project_emails" id="eproject" checked="">
                                        </div>
                                        <div class=" mb-1 col-md-4">
                                            <label class="form-level" for="econtract">Contract</label>
                                        </div>
                                        <div class="mb-1 col-md-8">
                                            <input class="form-check-input econtract" type="checkbox" name="contract_emails" id="econtract" checked="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="pupdatecontact" class="pupdatecontact btn btn-primary">Save</button>
            </div>
           </form>
                </div>
                
            </div>
          
        </div>
    </div>
</div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4 mt-2">
                    <div class="me-2 d-flex">
                        <div class="d-flex justify-content-end me-2">
                            {{$contacts->links()}}
                        </div>
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('customers.contact.export.pdf') }}">Pdf</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('customers.contact.export.excel') }}">Excel</a></li>
                            </ul>
                        </div>
                        <div>
                            <a href="{{ route('customers.contact') }}" class="btn btn-outline-secondary me-2 mb-3">
                                Reset
                            </a>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">
                                <form action="{{ route('customers.contact.search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="keyword" id="search" class="form-control" placeholder="Search Customer..." value="{{ request('keyword') }}">
                                        <button type="submit" class="btn btn-outline-secondary"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="table-responsive">
                  <table class="table mb-0 table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Frist Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Status</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Position</th>
                            <th scope="col">Last Login</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($contacts->isNotEmpty())
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contacts->firstItem() + $loop->index }}</th>
                                    <td>{{ $contact->firstname }}</td>
                                    <td>{{ $contact->lastname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ isset($contact->customer) ? $contact->customer->company : 'No Company' }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input p-contact-checkbox" type="checkbox" id="active" data-id="{{ $contact->id }}" <?php echo ($contact->active == 1) ? 'checked' : ''; ?>>
                                        </div>
                                    </td>
                                    <td>{{ $contact->phonenumber }}</td>
                                    <td>{{ $contact->title }}</td>
                                    <td>{{ $contact->last_login }}</td>
                                    <td>
                                         <a href="javascript:void(0)" data-bs-toggle="modal" id="edit-button" data-bs-target="#editModal" class="pcontactEdit" data-id="{{ $contact->id }}">
                                            <span class="bx bx-edit fs-5"></span>
                                        </a>
                                         @if($contact->is_primary != 1)
                                          <a href="javascript:void(0)" data-bs-target='#delete{{ $contact->id }}' data-bs-toggle="modal"><i class="bx bx-trash text-danger fs-5" ></i></a>
                                        @endif
                                    </td>
                                </tr>
                                 <!-- delete Modal -->
                                    <div class="modal fade" id="delete{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Are you sure want to delete this contact?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('customers.contact.delete_contact', $contact->id)}}" class="btn btn-danger">Confirm</a>
                                                </div>
                                            </div>
                                        </div>delete
                                    </div>

                            @endforeach
                        @endif
                    </tbody>
                </table>
              </div>
            </div>
            <div class="d-flex justify-content-end me-2">
                {{$contacts->links()}}
            </div>
        </div>
    </div>
</div>


@endsection


@push('js')
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<!-- Include SweetAlert CDN link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function () {
        $('.p-contact-checkbox').change(function () {
            var isActive = this.checked ? 1 : 0;
            var id = $(this).data('id');
            
            $.ajax({
                type: 'POST',
                url: '{{ route('customers.profile.contact.p_updatestatus', ['id']) }}',
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
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

//this is edit section 
 $(document).ready(function(){
    // Fetch contact details and populate modal on edit button click
    $(document).on('click', '.pcontactEdit', function(e){
        e.preventDefault();
        var contId = $(this).data('id');
        var url='pcontact/edit/' + contId;
        $.ajax({
            url:url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                    // Populate form fields with retrieved data
                    $("#contact_id").val(result.contact.id);
                    $("#customer_id").val(result.contact.customer_id);
                    $("#first_name").val(result.contact.firstname);
                    $("#last_name").val(result.contact.lastname);
                    $("#e_position").val(result.contact.title);
                    $("#e_email").val(result.contact.email);
                    $("#e_password").val(result.contact.password);
                    $("#e_phone").val(result.contact.phonenumber);
                    $("#e_direction").val(result.contact.direction);
                    // Handle checkboxes
                     $('#eprimary').prop('checked', result.contact.is_primary == 1).prop('disabled', result.contact.is_primary == 1);
                    $('#einvoice').prop('checked', result.contact.invoice_emails == 1);
                    $('#eestimate').prop('checked', result.contact.estimate_emails == 1);
                    $('#ecreditnote').prop('checked', result.contact.credit_note_emails == 1);
                    $('#econtract').prop('checked', result.contact.contract_emails == 1);
                    $('#etask').prop('checked', result.contact.task_emails == 1);
                    $('#eproject').prop('checked', result.contact.project_emails == 1);
                    $('#eticket').prop('checked', result.contact.ticket_emails == 1);
                    // Handle permissions checkboxes
                    $('#pinvoice').prop('checked', false);
                    $('#pestimate').prop('checked', false);
                    $('#pcontract').prop('checked', false);
                    $('#pproposal').prop('checked', false);
                    $('#psupport').prop('checked', false);
                    $('#pproject').prop('checked', false);
                    result.permissions.forEach(element => {
                        switch (element.permission_id) {
                            case 1:
                                $('#pinvoice').prop('checked', true);
                                break;
                            case 2:
                                $('#pestimate').prop('checked', true);
                                break;
                            case 3:
                                $('#pcontract').prop('checked', true);
                                break;
                            case 4:
                                $('#pproposal').prop('checked', true);
                                break;
                            case 5:
                                $('#psupport').prop('checked', true);
                                break;
                            case 6:
                                $('#pproject').prop('checked', true);
                                break;
                        }
                    });
                },
            error: function(xhr, status, error) {
                console.error('Error fetching contact details:', error);
            }
        });
    });
});
</script>
<script>
    $(document).ready(function(){
        $("#pupdatecontact").on('click', function(event){
            // Prevent default form submission
            event.preventDefault();

            // Set CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Serialize form data
            var formData = $("#pupdateform").serialize();
            
            // Retrieve contact ID
            var updateid = $("#contact_id").val();
            
            // Construct URL for update request
            var url = 'pcontact/update/' + updateid;

            // Send AJAX request
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: formData,
                 success: function(response) {
        // Trigger SweetAlert notification
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your message here',
        }).then((result) => {
            // Check if the user clicked "OK"
            if (result.isConfirmed) {
                // Fade out the edit modal
                $('#editModal').modal('hide');
                //for table page reload
                 location.reload();
            }
        });
    },
                error: function(xhr) {
        if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            // Check if the email field has an error
            if (errors && errors.email && errors.email.length > 0) {
                // Display the first error message for the email field
                var errorMessage = errors.email[0];
                console.log(errorMessage); // or display it to the user in some way
            }
        }
    }
            });
        });
    });
</script>
@endpush