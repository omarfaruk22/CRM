<div>
    <div class="card">
        <div class="card-body p-4">
            <form wire:submit="store">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="col-md-12 mb-2">
                            <label for="sub" class="form-label"><span style="color: red">*</span>
                                Subject</label>
                            <input name="subject" wire:model="subject" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="releted" class="form-label"><span style="color: red">*</span>
                                Releted</label>
                            <select id="dropdown" name="releted" wire:model="releted" class="form-select">
                                <option selected disabled value>Choose...</option>
                                <option name="options" id="lead" value="Lead">Lead</option>
                                <option name="options" id="customer" value="Customer">Customer</option>
                            </select>
                        </div>
                        <div class="my-4" id="outputdrop" style="display: none;">
                            <p><span style="color: red">*</span><span class="display-7" id="selectedOption"></span></p>
                            <input name="subreleted" wire:model="subreleted" class="form-control" type="text"
                                id="userInput" placeholder="Enter your input">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="date" class="form-label"><span style="color: red">*</span>Estimate
                                    Date</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">Date</div>
                                    <input type="date" name="estimateDate" wire:model="estimateDate"
                                        class="form-control" id="date" placeholder="2024-03-26">
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="otill" class="form-label">Open Till</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">choose ..</div>
                                    <input type="date" name="opentill" class="form-control" id="otill"
                                        placeholder="2024-03-26" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="default_currency" class="form-label">Currency</label>
                                <select name="default_currency" wire:model="default_currency" class="form-select mb-3"
                                    id="default_currency">
                                    <option value="">Select Currency</option>
                                    @if ($currencies->isNotEmpty())
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}
                                                {{ $currency->symbol }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="discount" class="form-label">Discount Type</label>
                                <select id="discount" name="discount" wire:model="discount" class="form-select">
                                    <option selected disabled value>Choose...</option>
                                    <option>No discount</option>
                                    <option>Before Tex</option>
                                    <option>After Tex</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa fa-tag"></i>Tags</label>
                                <select name="tag" multiple data-role="tagsinput">
                                    <option value="Amsterdam">Amsterdam</option>
                                    <option value="Washington">Washington</option>
                                    <option value="Sydney">Sydney</option>
                                    <option value="Beijing">Beijing</option>
                                    <option value="Cairo">Cairo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form- form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                        checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Allow
                                        Comments</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="row mb-2">
                            <div class="col-md-6 mb-2">
                                <label for="status" class="form-label"><span style="color: red">*</span>
                                    Status</label>
                                <input type="text" name="status" wire:model="status" class="form-control"
                                    id="to" placeholder="status" value="">
                                {{-- <select id="status" name="status" wire:model="status" class="form-select">
                                    <option selected disabled value>Choose...</option>
                                    <option>Draft</option>
                                    <option>Sent</option>
                                    <option>Open</option>
                                    <option>Declined</option>
                                    <option>Acceped</option>
                                </select> --}}
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="assigned" class="form-label">Assigned</label>
                                <select id="assigned" name="assigned" wire:model="assigned" class="form-select">
                                    <option selected disabled value>Choose...</option>
                                    <option value="7">Zander Kshlerin</option>
                                    <option value="2">Wilmer Borer</option>
                                    <option value="6">Talon Franecki</option>
                                    <option value="9">Ruben Bechtelar</option>
                                    <option value="1" selected="">Martin Fay</option>
                                    <option value="10">Keanu Schmeler</option>
                                    <option value="5">Jordan Buckridge</option>
                                    <option value="8">Gustave Dach</option>
                                    <option value="3">Darion Morissette</option>
                                    <option value="4">Adalberto Murazik</option>
                                    <option value="11">Abhishek Yadav</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="to" class="form-label">To</label>
                            <input type="text" name="to" wire:model="to" class="form-control"
                                id="to" placeholder="To" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" wire:model="address" placeholder="address"
                                rows="3"></textarea>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 mb-2">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="to" wire:model="city" class="form-control"
                                    id="to" value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" wire:model="state" class="form-control"
                                    id="to" value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="country" class="form-label">Country</label>
                                <select name="country" wire:model="country" class="form-select" id="country">
                                    <option>Select Country</option>
                                    @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->short_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="zipcode" class="form-label">Zip Code</label>
                                <input type="text" name="zipcode" wire:model="zipcode" class="form-control"
                                    id="to" value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label"><span
                                        style="color: red">*</span>Email</label>
                                <input type="email" name="email" wire:model="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" wire:model="phone" class="form-control" name="phone">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-6 mb-3">
                        <label for="item" class="form-label">Item</label>
                        {{-- successfull message start --}}
                        @if (session('item'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Weldone!</strong> {{ session('item') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- successfull message end --}}

                        <div class="input-group mb-3">
                            <select name="itemid" wire:model="itemid" class="form-select"
                                id="append-button-single-field">
                                <option selected>Open the select manu</option>
                                @foreach ($proposalItems as $proposalItem)
                                    <option value="{{ $proposalItem->id }}">{{ $proposalItem->description }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#createEstimate" type="button">+</button>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <span>Show quantity as:</span>
                            <input type="radio" name="options" id="option1" value="Option 1"> Qty
                            <input type="radio" name="options" id="option2" value="Option 2"> Hours
                            <input type="radio" name="options" id="option3" value="Option 2"> Qty/Hours
                            {{-- <div class="form-check form-check-success">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Qty</label>
                                    </div>
                                    <div class="form-check form-check-success">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioSuccess">
                                        <label class="form-check-label" for="flexRadioSuccess">Hours</label>
                                    </div>
                                    <div class="form-check form-check-success">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDanger">
                                        <label class="form-check-label" for="flexRadioDanger">Qty/Hours</label>
                                    </div> --}}
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table mb-0 table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Description</th>
                                <th id="output" scope="col">Qty</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Amount</th>
                                <th scope="col"><i class="lni lni-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <textarea class="form-control" id="description" placeholder="Description" rows="3"></textarea>
                                </th>
                                <td>
                                    <textarea class="form-control" id="long_description" placeholder="Long Description" rows="3"></textarea>
                                </td>
                                <td><input type="number" name="qty" class="form-control" id="hour"
                                        placeholder="" value=""></td>
                                <td><input type="number" name="rate" class="form-control" id="rate"
                                        placeholder="" value=""></td>
                                <td>
                                    <div class="mb-2">
                                        <select id="customer" name="customer" class="form-select">
                                            <option selected disabled value>No Tax</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </td>
                                <td id="displayhourrate">

                                </td>
                                <td>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary px-2 pr-0"><i
                                                class='lni lni-checkmark'></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row table-responsive d-flex justify-content-end mb-5">
                    <div class="col-md-8">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td colspan="7"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7"></td>
                                    <td style="text-align: right;">Sub Total :</td>
                                    <td id="displayhourrate" style="text-align: right; width: 100px;">$0.00</td>
                                </tr>
                                <tr>
                                    <td colspan="7"></td>
                                    <td style="text-align: right;">
                                        <div class="input-group">
                                            <span>Discount</span>&nbsp; &nbsp;
                                            <input type="number" name="discount" class="form-control"
                                                id="discount" placeholder="0" value="">
                                            <select class="form-select" id="prepend-append-dropdown-single-field"
                                                data-placeholder="Choose one thing" style="max-width: 150px;">
                                                <option>%</option>
                                                <option>Fixed Amount</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="text-align: right; width: 100px;">-$0.00</td>
                                </tr>
                                <tr>
                                    <td colspan="7"></td>
                                    <td style="text-align: right;">
                                        <div class="input-group">
                                            <span>Adjustment</span>&nbsp; &nbsp;
                                            <input type="number" name="adjustment" class="form-control"
                                                id="adjustment" placeholder="0" value="">
                                        </div>
                                    </td>
                                    <td id="displayNumber" style="text-align: right; width: 100px;">-$0.00</td>
                                </tr>
                                <tr>
                                    <td colspan="7"></td>
                                    <td style="text-align: right;">Total:</td>
                                    <td id="displayNumber1" wire:model="total"
                                        style="text-align: right; width: 100px;">$0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="row mt-5 mb-3">
                    <p>Include proposal items with merge field anywhere in proposal content as {proposal_items}</p>

                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-white">Save & Send</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var option1 = document.getElementById('option1');
                    var option2 = document.getElementById('option2');
                    var option3 = document.getElementById('option3');
                    var dropdown = document.getElementById('dropdown');
                    var output = document.getElementById('output');
                    var outputdrop = document.getElementById('outputdrop');
                    var selectedOption = document.getElementById('selectedOption');
                    var userInput = document.getElementById('userInput');

                    option1.addEventListener('click', function() {
                        output.innerText = "Qty";
                    });

                    option2.addEventListener('click', function() {
                        output.innerText = "Hours";
                    });
                    option3.addEventListener('click', function() {
                        output.innerText = "Qty/Hours";
                    });
                    dropdown.addEventListener('click', function() {
                        outputdrop.style.display = this.selectedIndex !== 0 ? 'block' : 'none';
                    });

                    dropdown.addEventListener('change', function() {
                        var selectedValue = this.value;
                        if (selectedValue) {
                            outputdrop.style.display = 'block';
                            selectedOption.textContent = selectedValue;
                            userInput.focus();
                        } else {
                            outputdrop.style.display = 'none';
                        }
                    });

                    // Get the input field and the section to display the number
                    const inputNumber = document.getElementById('adjustment');
                    const displayNumber = document.getElementById('displayNumber');
                    const displayNumber1 = document.getElementById('displayNumber1');
                    const hourInput = document.getElementById('hour');
                    const rateInput = document.getElementById('rate');
                    const displayhourrate = document.getElementById('displayhourrate');

                    const hourValue = parseFloat(hourInput);
                    const rateValue = parseFloat(rateInput);
                    console.console.log(hourValue);
                    // Perform the multiplication
                    const HourRate = hourValue + rateValue;

                    // Update the content of the element to display the HourRate
                    displayhourrate.innerText = HourRate;

                    // Add an event listener to capture changes in the input field
                    inputNumber.addEventListener('input', function(event) {
                        // Get the value from the input field
                        const inputValue = event.target.value;

                        // Update the content of the section with the input value
                        displayNumber.textContent = '$ ' + inputValue;
                        displayNumber1.textContent = '$ ' + inputValue;
                    });
                });
            </script>
        </div>

    </div>
</div>
