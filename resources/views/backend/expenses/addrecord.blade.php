@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

<div class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add new Expense</h5>
                 <div class="card-body">

                    <form class="form">
                        <input type="file" class="form-control my-3" id="fileInput" name="fileInput">

                        <div class="row mb-3">
                            <div class="col">
                                <label for="nameInput"> <span class="text-danger">*</span> Name</label>
                                <input type="text" class="form-control" id="nameInput" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="notesInput"> <span class="text-danger">*</span> Note</label>
                                <textarea id="notesInput" class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="typeSelect"><span class="text-danger">*</span> Expense Category</label>
                                <div class="input-group">
                                    <select class="form-select mb-3" id="typeSelect" name="typeSelect" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                    </select>
                                    <span>
                                        <button type="button" class="btn btn-outline-secondary gnameCreateButton" data-bs-toggle="modal" data-bs-target="#expenseCategoryModal" id="addExpenseCategoryButton">
                                            +
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="expenseDateInput"> <span class="text-danger">*</span> Expense Date</label>
                                <input type="date" class="form-control" id="expenseDateInput" name="expenseDate" value="2024-05-21">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="amountInput">  <span class="text-danger">*</span> Amount</label>
                                <input type="number" class="form-control" id="amountInput" name="amount">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="customerSelect"> Customer</label>
                                <select class="form-select" id="customerSelect" name="customer">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="saveButton">Save</button>
                    </div>
                    </form>

                 </div>
            </div>

        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add new Expense</h5>
                 <div class="card-body">

                    <form class="form">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="currencyInput"> <span class="text-danger">*</span> Currency</label>
                                <input type="text" class="form-control" value="$USD" name="currency" id="currencyInput" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="taxOneSelect">  <span class="text-danger">*</span> Tax 1</label>
                                <select class="form-select" name="taxOne" id="taxOneSelect">
                                    <option selected>No tax </option>
                                    <option value="1">12%</option>
                                    <option value="2">25%</option>
                                    <option value="3">30%</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="taxTwoSelect">  <span class="text-danger">*</span> Tax 2</label>
                                <select class="form-select" name="taxTwo" id="taxTwoSelect" disabled>
                                    <option selected>No tax</option>
                                    <option value="1">12%</option>
                                    <option value="2">25%</option>
                                    <option value="3">30%</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="paymentMethodSelect">  Payment Method</label>
                                <select class="form-select" name="paymentMethod" id="paymentMethodSelect">
                                    <option selected>No tax </option>
                                    <option value="1">Bank</option>
                                    <option value="2">Online</option>
                                    <option value="3">Cash</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="referenceInput">  Reference #</label>
                                <input type="text" class="form-control" name="reference" id="referenceInput">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="repeatSelect"> Repeat every</label>
                                <select class="form-select" name="repeat" id="repeatSelect">
                                    <option selected>No Repeat </option>
                                    <option value="1">Every 3 months</option>
                                    <option value="2">Every 4 months</option>
                                    <option value="3">Every 5 months</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3" id="totalcycle">
                            <div class="col">
                                <label for="customerSelect"> Total Cycles</label>
                                <input type="text" class="form-control" >
                            </div>
                        </div>


                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    </form>



                 </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="expenseCategoryModal" tabindex="-1" aria-labelledby="expenseCategoryModalLabel" aria-hidden="true">
   <style>
       .modal-dialog {
          min-width: 50% !important;  /* Change this to your desired width */
        }
   </style>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="expenseCategoryModalLabel">New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="customer-name" class="form-label">Customer Name</label>
              <input type="text" class="form-control" id="customer-name">
            </div>
            <div class="mb-3">
              <label for="customer-description" class="form-label">Customer Description</label>
              <textarea class="form-control" id="customer-description" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('js')

<script>
    $("#fancy-file-upload").FancyFileUpload({
      params: {
        action: "fileuploader",
      },
      maxfilesize: 1000000,
    });

    $(document).ready(function() {
    // Hide the div by default
    $('#total-cycle').hide();

    // Show the div when an option is selected
    $('#customerSelect').change(function() {
        if ($(this).val() != 'Open this select menu') {
            $('#total-cycle').show();
        } else {
            $('#total-cycle').hide();
        }
    });
});


</script>

  <script>
	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#groups').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>
@endpush
