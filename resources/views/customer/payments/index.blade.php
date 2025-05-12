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
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#refundPaymentModal{{ $payment->id }}">Refund</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePaymentModal{{ $payment->id }}">Cancel</button>
                </td>
            </tr>

            <!-- Add Booking Modal -->
            <div class="modal fade" id="showPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="showPaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showPaymentModalLabel{{ $payment->id }}">Show Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if( $payment->tour )
                            <p><strong>Tour Name:</strong> {{ $tour->name }}</p>
                            <p><strong>Destination:</strong> {{ $tour->destination->name }}</p>
                            <p><strong>Location:</strong> {{ $tour->location }}</p>
                            <p><strong>Duration:</strong> {{ $tour->duration }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($tour->status) }}</p>
                            <p><strong>Description:</strong> {{ $tour->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
                            <form action="{{ route('customers.payments.refund', $payment->id) }}" method="POST">
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
                            <form action="{{ route('customers.payments.cancel', $payment->id) }}" method="POST">
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