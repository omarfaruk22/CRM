<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <style>
        body {
            background-color: #ffffff;
            color: #333333;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        @media print {
            body {
                background-color: #ffffff;
                color: #000000;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <p>Date: {{ $currentDate }}</p>
    <p>{!! $ticket_replay->message !!}</p>
</body>
</html>
