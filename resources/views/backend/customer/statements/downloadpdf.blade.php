<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Customer Contact Statement</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- Invoice styling -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>

		<div class="invoice-box">
			<table>
                <tr class="top">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td class="title">
                                    <h4 class="text-primary ">Smart Software Ltd</h4>
                                </td>


                                <td>
                                    Customer #: {{ $customer->id }}<br />
                                    <p class="p-0 m-0">Invoice Date: {{ now()->format('Y-m-d') }}</p>

                                    <p class="p-0 m-0"> Invoice time: {{ now()->format('H:i a') }}</p>
                                    <p class="p-0 m-0">Req date: {{ $customer->created_at->format('Y-m-d') }}</p>
                                    {{-- Time : {{ \Carbon\Carbon::now()->setTimezone('Asia/Dhaka')->format('g:i a') }}<br/> --}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td>
                                    <h4><b> Info</b></h4>
                                    Customer/ Company :  {{ $customer->company }}<br />
                                    Contact  : {{ $contact->firstname }} {{ $contact->lastname }}<br />
                                    Vat Number:{{ $customer->vat }}<br />
                                    Invoice Date: {{ now()->format('Y-m-d') }}<br />

                                </td>

                                <td>
                                    <h4>Account summary</h4>
                                    <p style="border-bottom: 1px solid #000;">{{ now()->format('Y-m-d') }} To {{ $customer->created_at->format('Y-m-d') }}</p>

                                    Beginning Balance : 20000 $<br />
                                    Invoiced Amount:  : 2590 $<br />
                                    Amount Paid : 1500 $<br />
                                    <hr class="my-0">
                                    Balance Due: 1090 $

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table>
                            <tr>
                                <td>
                                   <div class="text-center"> <b>Showing all invoices and payments between {{ now()->format('Y-m-d') }} To {{ $customer->created_at->format('Y-m-d') }}</b></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td colspan="4">
                        <table>
                            <tr>
                                <th class="text-center">Customer </th>
                                <th class="text-center">Details </th>
                                <th class="text-center">Amount </th>
                                <th class="text-center">Payments </th>
                                <th class="text-center">Balance </th>
                            </tr>
                        </table>
                    </td>

                </tr>


                <tr class="item">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td class="text-center"> leoo</td>
                                <td class="text-center"> leoo</td>
                                <td class="text-center"> leoo</td>
                                <td class="text-center"> leoo</td>
                            </tr>
                        </table>
                    </td>
                </tr>

				<tr class="total">
					<td></td>

					<td colspan="3">Total: $385.00</td>
				</tr>
			</table>
		</div>
	</body>
</html>
