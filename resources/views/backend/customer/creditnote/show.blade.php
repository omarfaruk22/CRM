@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
<div class="col-md-12">
            <div class="d-flex justify-content-between ">
                <div class="mb-3">
                    <a href="{{ route('customers.profile.creditnote.create',1) }}" type="button" class="btn btn-primary px-2">+ New Credit Note</a>
                </div>
                <div class="mb-3 d-flex justify-content-end ">
                    <button type="button" class="btn btn-white px-2 " data-bs-toggle="modal" data-bs-target="#contact"><i class='bx bxs-filter-alt' ></i></button>
                </div>
            </div>
<div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="col-md-8">
                    <ul class="nav nav-pills " role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#creditnote" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                    </div>
                                    <div class="tab-title">Credit Note</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#incredit" role="tab" aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                    </div>
                                    <div class="tab-title">Invoices Credited</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#refunds" role="tab" aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                    </div>
                                    <div class="tab-title">Refunds</div>
                                </div>
                            </a>
                        </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#reminders" role="tab" aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                    </div>
                                    <div class="tab-title">Reminders</div>
                                </div>
                            </a>
                        </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#email" role="tab" aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-envelope'></i>
                                    </div>
                                    <div class="tab-title"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                </div>
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="mt-3">
                            <span class="badge bg-success">open</span>
                        </div>
        <div class="mb-1">
                <div class="row gx-1">
                    <div class="col-auto px-1">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="bx bxs-file-pdf "></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto px-1">
                        <a href="#" class="btn btn-white btn-sm"><span class="bx bx-edit "></span></a>
                    </div>
                    <div class="col-auto px-1">
                        <a href="#" class="btn btn-white btn-sm"><span class="bx bx-envelope "></span></a>
                    </div>
                    <div class="col px-1">
                        <a href="#" class="btn btn-primary btn-sm d-block">Apply to Invoice</a>
                    </div>
                    <div class="col-auto px-1">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>       
<div class="tab-content py-3">
    <div class="tab-pane fade active show" id="creditnote" role="tabpanel">
            <div class="col-md-12 mb-2"> <div class="row">
                <div class="col-md-6 mb-4">
                        <span class="fw-bold">INV-000002</span><br>
                        <span class="fw-bold">Perfex INC</span><br>
                        <span>172 Ivy Club Gottliebfurt</span><br>
                        <span>New Heaven, Canada [CA] 2364</span><br>
                </div>
                <div class="col-md-6 mb-4">
                        <div class="text-md-end">
                            <span class="fw-bold">To</span><br>
                            <span class="fw-bold">Bashirian and Sons</span><br>
                            <span>14525 Melisa Valley</span><br>
                            <span>Sibylside, Massachusetts TL 07155</span><br>
                            <span>Estimate Date: 2024-03-28</span><br>
                            <span>Expiry Date: 2024-04-25</span><br>
                            <span>Sales Agent: Lorenzo Wilderman</span><br>
                        </div>
                </div>
                </div>
                <div class="mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Consultant Services It was the White Rabbit, who was reading the list of the way to fly up into a chrysalis--you will.</td>
                                <td>1</td>
                                <td>350.00</td>
                                <td>0%</td>
                                <td>350.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-md-end"></td>
                                    <td class="text-md-end fw-bold">Sub Total</td>
                                    <td class="text-md-end">Rp1,610.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-md-end"></td>
                                    <td class="text-md-end fw-bold">TAX1 (18.00%)</td>
                                    <td class="text-md-end">Rp216.00</td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-md-end"></th>
                                    <td class="text-md-end fw-bold">Total</td>
                                    <td class="text-md-end">Rp1,826.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div>
                    <span class="fw-bold">Terms & Conditions</span><br><br>
                    <p>Gryphon, and, taking Alice by the officers of the March Hare. 'Then it doesn't understand English,' thought Alice; 'but when you have of putting things!' 'It's a friend of mine--a Cheshire Cat,' said Alice: 'three inches is such a thing as "I sleep when I find a thing,' said the Mock Turtle. 'No.</p>
                </div>
                <table class="table table-hover invoice-payments-table tw-mt-2.5">
                <thead>
                    <tr>
                        <th>Payment #</th>
                        <th>Payment Mode</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><button type="submit" value="4" class="btn btn-icon btn-default pull-right" name="paymentpdf"><i class="fa-regular fa-file-pdf"></i></button>Bank </td>
                        <td>28/03/2024</td>
                        <td>$3,332.00</td>
                    </tr>
                </tbody>
            </table>
    </div>
                            </div>
                            <div class="tab-pane fade" id="incredit" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Credited Invoices Not Found</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="refunds" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <p>No refunds found</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reminders" role="tabpanel">
                                {{-- modal start  --}}
                                <div class="modal fade" id="reminder" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <div class="">
                        <h6 class="modal-title"><span style="border: 1px solid black; border-radius: 50%; width: 1px; height: 1px;"><i class='bx bx-question-mark'></i></span> Set Reminder</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <div class="form">
                    <form action="">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Date to be notified:</label>
                                    <input type="datetime-local" class="form-control">
                                </div>
                                <div class="mb-3 col-md-12">
                                <label class="form-label">Set reminder to:</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select ...</option>
                                        <option value="2">RTL</option>
                                        <option value="2">RTL</option>
                                        <option value="1">LTR</option>
                                        <option value="2">RTL</option>
                                        <option value="2">RTL</option>
                                        <option value="2">RTL</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea id="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Send also an email for this reminder</label>
                                </div>
                                
                                
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- this is edit modal  --}}
<div class="modal fade" id="editreminder" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex">
                            <div class="">
                                <h6 class="modal-title"><span style="border: 1px solid black; border-radius: 50%; width: 1px; height: 1px;"><i class='bx bx-question-mark'></i></span> Edit Reminder</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="form">
                            <form action="">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Date to be notified:</label>
                                            <input type="datetime-local" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                        <label class="form-label">Set reminder to:</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Select ...</option>
                                                <option value="2">RTL</option>
                                                <option value="2">RTL</option>
                                                <option value="1">LTR</option>
                                                <option value="2">RTL</option>
                                                <option value="2">RTL</option>
                                                <option value="2">RTL</option>
                                            </select>
                                        </div>
                                       <div class="mb-3 col-md-12">
                                            <label for="description" class="form-label">Description:</label>
                                            <textarea id="description" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                           <label class="form-check-label" for="flexSwitchCheckChecked">Send also an email for this reminder</label>
                                        </div>
                                     
                                        
                                </div>
                            </form>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
    </div>
        {{-- edit modal end --}}
										 <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col mb-3">
                                                        <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#reminder" class="btn btn-primary px-2"><i class='bx bxs-bell'></i>Set Credit Note Reminder</a>
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
                                                                    <input type="text" wire:model.live="search" class="form-control" id="searchId" autocomplete="off" placeholder="Search Users...">
                                                                    <i class="ri-search-line search-icon"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table id="tableId" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>Date</th>
                                                                    <th>Remind</th>
                                                                    <th>Is Notified?</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Void and Voidable Contracts</td>
                                                                    <td>Rp1,665.00</td>
                                                                    <td>2024-03-26</td>
                                                                    <td>2024-04-06</td>
                                                                    <td>
                                                                        <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#editreminder"  >
                                                                            <span class="bx bx-edit fs-5"></span>
                                                                        </a>
                                                                        <a href="">
                                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
									</div>
                                    <div class="tab-pane fade" id="email" role="tabpanel">
										<p>No refunds found</p>
									</div>
								</div>
							
            </div>
        </div>

    </div>
</div>
@endsection

