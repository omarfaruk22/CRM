<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <style>
        table, tr, th, td{
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Ser</th>
                <th>Company Name</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer['company'] }}</td>
                    <td>{{ $customer['phonenumber'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>



