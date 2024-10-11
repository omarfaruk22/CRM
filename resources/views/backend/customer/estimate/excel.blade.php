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
    {{-- This table create for testing purpose --}}
    <table>
        <thead>
            <tr>
                <th>Ser</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estimates as $estimate)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $estimate['title'] }}</td>
                    <td>{{ $estimate['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>



