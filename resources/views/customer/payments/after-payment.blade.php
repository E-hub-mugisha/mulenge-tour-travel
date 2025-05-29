@extends('layouts.app')
@section('content')
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

<div class="container">
    <div class="payment-card text-center">
        <h3 class="mb-4">Tour Booking Payment</h3>

        <p><strong>Booking ID:</strong> #</p>
        <p><strong>Email:</strong> </p>
        <p><strong>Amount:</strong> <span class="text-success">$</span></p>

        <button class="btn btn-pay mt-3 w-100">Return Home</button>
    </div>
</div>
@endsection