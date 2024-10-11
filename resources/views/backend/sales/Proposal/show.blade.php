<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>Customer View</title>
    {{-- <style>
        @media (min-width: 426px) {
            .card{
                padding: 96px;
            }
        }
    </style> --}}
</head>

<body style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo mb-3">
                    <img src="{{ asset('backend/assets/images/smart-logo-removebg.png') }}" width="150"
                        alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-2">
                    <h5># PRO-000003 </h5>
                    <p> <small>house for rent deal</small></p>
                </div>
                <div class="mb-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-2"><i
                            class="fa-solid fa-file-pdf"></i> Download</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-2"><i class="fa-solid fa-x"></i>
                        Decline</button>
                    <button type="button" class="btn btn-success btn-sm px-2"><i class="fa-solid fa-check"></i>
                        Accept</button>
                </div>
            </div>
            <div class="col-md-9 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
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
                            <table class="table table-responsive">
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
                                        <td>Consultant Services It was the White Rabbit, who was reading the list of the
                                            way to fly up into a chrysalis--you will.</td>
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
                            <p>Gryphon, and, taking Alice by the officers of the March Hare. 'Then it doesn't understand
                                English,' thought Alice; 'but when you have of putting things!' 'It's a friend of
                                mine--a Cheshire Cat,' said Alice: 'three inches is such a thing as "I sleep when I find
                                a thing,' said the Mock Turtle. 'No.</p>
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
                                    <td><button type="submit" value="4"
                                            class="btn btn-icon btn-default pull-right" name="paymentpdf"><i
                                                class="fa-regular fa-file-pdf"></i></button>Bank </td>
                                    <td>28/03/2024</td>
                                    <td>$3,332.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-notepad'></i>
                                    </div>
                                    <div class="tab-title">Summary</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-comment'></i>
                                    </div>
                                    <div class="tab-title">Discussion</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="primary-pills-home" role="tabpanel">
                            <div class="col-md-12 mb-4">
                                <span class="fw-bold">INV-000002</span><br>
                                <span class="fw-bold">Perfex INC</span><br>
                                <span>172 Ivy Club Gottliebfurt</span><br>
                                <span>New Heaven, Canada [CA] 2364</span><br>
                            </div>
                            <hr>
                            <div class="col-md-12 mb-5">
                                <span class="fw-bold">Proposal Information</span><br>
                                <span class="fw mb-2">White-McCullough</span><br>
                                <span>33564 Sonia Summit Suite 601 <br>
                                    Hesselchester New York</span><br>
                                <span>GB 86374-8554
                                    <br>+1-484-454-5717
                                    <br>benny.heathcote@example.com</span><br>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="row ">
                                    <div class="tw-text-normal col-md-12 proposal-html-total">
                                        <h4 class="bold tw-mb-3"> Total $2,537.00</h4>
                                    </div>
                                    <div class="tw-text-normal col-md-4 text-muted proposal-status">
                                        Status
                                    </div>
                                    <div class="tw-text-normal col-md-8 proposal-status tw-text-neutral-700">Declined
                                    </div>
                                    <div class="tw-text-normal col-md-4 text-muted proposal-date"> Date </div>
                                    <div class="tw-text-normal col-md-8 proposal-date tw-text-neutral-700">30/03/2024
                                    </div>
                                    <div class="tw-text-normal col-md-4 text-muted proposal-open-till">Open Till </div>
                                    <div class="tw-text-normal col-md-8 proposal-open-till tw-text-neutral-700">
                                        06/04/2024 </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="row ">
                                    <div class="col-md-12 proposal-value">
                                        <h4 class="bold ">Signature </h4>
                                    </div>
                                    <div class="col-md-5 text-muted proposal-signed-by">Signer Name </div>
                                    <div class="col-md-7 proposal-proposal-signed-by">oo jj </div>

                                    <div class="col-md-5 text-muted proposal-signed-by">Signed Date </div>
                                    <div class="col-md-7 proposal-proposal-signed-by">30/03/2024 </div>

                                    <div class="col-md-5 text-muted proposal-signed-by">IP Address </div>
                                    <div class="col-md-7 proposal-signed-by">103.217.111.19 </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                            <div class="col-md-12 mb-1">
                                <form action="">
                                    <textarea class="form-control" id="description" placeholder="Description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="" class="btn btn-primary">Add Comment</a>

                            </div>

                            </form>
                            <div class="col-md-12 mb-2">
                                <div class="row ">
                                    <div class="col-md-12 proposal-value">
                                        <h4 class="bold ">Signature </h4>
                                    </div>
                                    <div class="col-md-5 text-muted proposal-signed-by">Signer Name </div>
                                    <div class="col-md-7 proposal-proposal-signed-by">oo jj </div>

                                    <div class="col-md-5 text-muted proposal-signed-by">Signed Date </div>
                                    <div class="col-md-7 proposal-proposal-signed-by">30/03/2024 </div>

                                    <div class="col-md-5 text-muted proposal-signed-by">IP Address </div>
                                    <div class="col-md-7 proposal-signed-by">103.217.111.19 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>
