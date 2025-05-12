@extends('layouts.app')
@section('title', 'Destinations | Mulenge')
@section('content')
<div class="container">
    <h2 class="mb-4">Destinations</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Destinations Table -->
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $destination)
            <tr>
                <td>{{ $destination->name }}</td>
                <td>{{ $destination->description }}</td>
                <td><img src="{{ $destination->image }}" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
