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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Last Login</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $index => $contact)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ isset($contact->customer) ? $contact->customer->company : 'No Company' }}</td>
                <td>{{ $contact->phonenumber }}</td>
                <td></td>
                <td>{{ $contact->last_login }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



