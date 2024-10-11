<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Customer View</title>
    <style>
        @media (min-width: 426px) {
            .card{
                padding: 96px;
            }
        }
    </style>
  </head>
  <body style="background-color: #f8f9fa;">
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <img src="{{ asset('backend/assets/images/smart-logo-removebg.png') }}" width="150" alt="Logo">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="badge border border-secondary text-secondary">Draft</span>
                    </div>
                    <div>
                        <a href="{{ route('customers.profile.estimates.show.estimates_invoice',1) }}" type="button" class="btn btn-outline-secondary btn-sm px-2"><i class="fa-solid fa-file-pdf"></i> Download</a>
                        <button type="button" class="btn btn-outline-secondary btn-sm px-2"><i class="fa-solid fa-x"></i> Decline</button>
                        <button type="button" class="btn btn-success btn-sm px-2"><i class="fa-solid fa-check"></i> Accept</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="fw-bold">EST-000002</span><br>
                                <span class="fw-bold">Perfex INC</span><br>
                                <span>172 Ivy Club Gottliebfurt</span><br>
                                <span>New Heaven, Canada [CA] 2364</span><br>
                            </div>
                            <div class="col-md-6">
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
                                        <td>Consultant Services It was the White Rabbit, who was reading the list of the way to fly up into a chrysalis--you will.</td>
                                        <td>1</td>
                                        <td>350.00</td>
                                        <td>0%</td>
                                        <td>350.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb-5">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>








