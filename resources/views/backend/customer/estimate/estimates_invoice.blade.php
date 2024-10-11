<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd; /* Gray border for the table */
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd; /* Gray border for table cells */
        }
        .invoice-header, .invoice-footer {
            margin-bottom: 20px;
        }
        .invoice-header::after, .invoice-footer::after {
            content: '';
            display: block;
            clear: both;
        }
        .invoice-header div, .invoice-footer div {
            float: left;
            width: 50%;
        }
        .text-right {
            text-align: right;
        }
        .table-container {
            margin-bottom: 20px; /* Add space below the table */
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <div>
            <span>EST-000002</span><br>
            <span>Perfex INC</span><br>
            <span>172 Ivy Club Gottliebfurt</span><br>
            <span>New Heaven, Canada [CA] 2364</span><br>
        </div>
        <div class="text-right">
            <span>To</span><br>
            <span>Bashirian and Sons</span><br>
            <span>14525 Melisa Valley</span><br>
            <span>Sibylside, Massachusetts TL 07155</span><br>
            <span>Estimate Date: 2024-03-28</span><br>
            <span>Expiry Date: 2024-04-25</span><br>
            <span>Sales Agent: Lorenzo Wilderman</span><br>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Tax</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estimatesInvoice as $index => $invoice)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $invoice['title'] }}</td>
                    <td>1</td>
                    <td>{{ $invoice['description'] }}</td>
                    <td>18%</td>
                    <td>350.00</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Sub Total</td>
                    <td class="text-right">Rp1,610.00</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">TAX1 (18.00%)</td>
                    <td class="text-right">Rp216.00</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">Total</td>
                    <td class="text-right">Rp1,826.00</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <hr>

    <div>
        <span>Terms & Conditions</span><br>
        <p>Gryphon, and, taking Alice by the officers of the March Hare. 'Then it doesn't understand English,' thought Alice; 'but when you have of putting things!' 'It's a friend of mine--a Cheshire Cat,' said Alice: 'three inches is such a thing as "I sleep when I find a thing,' said the Mock Turtle. 'No.</p>
    </div>
</body>
</html>
