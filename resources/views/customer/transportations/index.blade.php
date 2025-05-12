@extends('layouts.app')
@section('title', 'Transportations | Mulenge')
@section('content')
<div class="container">
    <h2>transportations Management</h2>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- transportations Table -->
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transportations as $transportation)
            <tr>
                <td>{{ $transportation->id }}</td>
                <td>{{ $transportation->type_name }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection