<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Notification</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p {
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        .message {
            background-color: #e6f7ff;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transaction Notification</h1>
        <p>Dear user  {{ $user->name }},</p>
        <p>Your transaction has been processed kindly Enter transaction Pin.</p>
        <div class="message">
            <p><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</p>
            <!-- Include any other transaction details you want to include in the email -->
        </div>
    </div>
</body>
</html>
