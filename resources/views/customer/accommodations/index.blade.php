@extends('layouts.app')
@section('title', 'Accommodations | Mulenge')
@section('content')
<div class="container">
    <h2>Accommodations Management</h2>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Accommodations Table -->
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accommodations as $accommodation)
            <tr>
                <td>{{ $accommodation->id }}</td>
                <td>{{ $accommodation->type_name }}</td>              
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection