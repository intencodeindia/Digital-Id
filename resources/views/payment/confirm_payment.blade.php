<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhonePe Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .payment-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="payment-container">
        <h4 class="text-center mb-4">Payment Success</h4>
        <p>Thank you for your payment. Your transaction has been successful.</p>    
        <p>Transaction ID: {{ $transactionId }}</p>
        <p>Provider Reference ID: {{ $providerReferenceId }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>