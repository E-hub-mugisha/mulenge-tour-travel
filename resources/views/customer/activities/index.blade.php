@extends('layouts.app')
@section('title', 'Activities | Mulenge')
@section('content')
<div class="container">
    <h2>activites Management</h2>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- activites Table -->
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activites as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->name }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>


@endsection