@extends('layouts.app')
@section('title','Booking Payments | Mulenge')
@section('content')
<div class="container">
    <h1>Booking Payments</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Bookings Table -->
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Booking</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->user->name }}</td>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->status }}</td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#showPaymentModal{{ $payment->id }}"> view detail</button>
                    <!-- <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#refundPaymentModal{{ $payment->id }}">Refund</button> -->
                    <!-- <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePaymentModal{{ $payment->id }}">Cancel</button> -->
                </td>
            </tr>

            <!-- Show Payment Modal -->
            <div class="modal fade" id="showPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="showPaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- wider modal -->
                    <div class="modal-content" id="receiptContent{{ $payment->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showPaymentModalLabel{{ $payment->id }}">Payment & Booking Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            @if($payment->booking && $payment->booking->tour)
                            <h6 class="mb-3">🧳 <strong>Tour Information</strong></h6>
                            <p><strong>Tour Name:</strong> {{ $payment->booking->tour->name }}</p>
                            <p><strong>Destination:</strong> {{ $payment->booking->tour->destination->name }}</p>
                            <p><strong>Location:</strong> {{ $payment->booking->tour->location }}</p>
                            <p><strong>Duration:</strong> {{ $payment->booking->tour->duration }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($payment->booking->tour->status) }}</p>
                            <p><strong>Description:</strong> {{ $payment->booking->tour->description }}</p>
                            <hr>
                            <h6 class="mb-3">💳 <strong>Payment Information</strong></h6>
                            <p><strong>Payment Method:</strong> {{ ucfirst($payment->method ?? 'N/A') }}</p>
                            <p><strong>Amount Paid:</strong> ${{ number_format($payment->amount, 2) }}</p>
                            <p><strong>Payment Date:</strong> {{ $payment->created_at->format('F j, Y') }}</p>
                            @else
                            <p class="text-danger">Tour or payment details not available.</p>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <!-- Print/Download Button -->
                            <button type="button" class="btn btn-primary" onclick="printReceipt({{ $payment->id }})">
                                <i class="fa fa-print"></i> Print / Download Receipt
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JS Print Script -->
            <script>
                function printReceipt(paymentId) {
                    const receiptContent = document.getElementById(`receiptContent${paymentId}`).innerHTML;
                    const originalContent = document.body.innerHTML;

                    document.body.innerHTML = receiptContent;
                    window.print();
                    document.body.innerHTML = originalContent;
                    location.reload(); // Reload to restore event bindings and styles
                }
            </script>

            <!-- Refund Confirmation Modal -->
            <div class="modal fade" id="refundPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="refundPaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="refundPaymentModalLabel{{ $payment->id }}">Confirm Refund</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to refund this Payment?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.payments.refund', $payment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">Refund</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deletePaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="deletePaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePaymentModalLabel{{ $payment->id }}">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to cancel this payment?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.payments.cancel', $payment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>


@endsection