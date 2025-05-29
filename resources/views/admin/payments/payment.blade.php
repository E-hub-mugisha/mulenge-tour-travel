<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Payment - Tour Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .payment-card {
            max-width: 500px;
            margin: 100px auto;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        .btn-pay {
            background-color: #f57c00;
            color: white;
        }

        .btn-pay:hover {
            background-color: #ef6c00;
        }

        .option-icon {
            font-size: 2rem;
            margin-right: 10px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="payment-card text-center">
            <h3 class="mb-4">Tour Booking Payment</h3>

            <p><strong>Booking ID:</strong> #{{ $booking_id }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Amount:</strong> <span class="text-success">${{ number_format($amount, 2) }}</span></p>

            <hr class="my-4">

            <h5>Available Payment Options</h5>
            <ul class="list-group text-start mb-3">
                <li class="list-group-item d-flex align-items-center">
                    💳 <span class="ms-2">Card (Visa, MasterCard, Verve)</span>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    📱 <span class="ms-2">Rwanda Mobile Money (MTN, Airtel)</span>
                </li>
            </ul>

            <button id="payBtn" class="btn btn-pay mt-3 w-100">Pay Now</button>
        </div>
    </div>

    <script>
    document.getElementById('payBtn').addEventListener('click', function() {
        const txRef = "{{ $booking_id }}-" + Date.now();

        FlutterwaveCheckout({
            public_key: "{{ $public_key }}",
            tx_ref: txRef,
            amount: 40,
            currency: "RWF",
            payment_options: "card, mobilemoneyrwanda",
            customer: {
                email: "{{ $email }}",
            },
            callback: function(data) {
                const url = `/admin/tour/payment/callback?transaction_id=${encodeURIComponent(data.transaction_id)}&status=${encodeURIComponent(data.status)}&tx_ref=${encodeURIComponent(data.tx_ref)}`;
                window.location.href = url;
            },
            onclose: function() {
                alert('Payment process was closed.');
            },
            customizations: {
                title: "Tour Booking Payment",
                description: "Payment for booking #{{ $booking_id }}",
            },
        });
    });
</script>

</body>

</html>