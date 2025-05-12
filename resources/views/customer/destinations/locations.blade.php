@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Destination Locations</h2>
    
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Destination</th>
                <th>Name</th>
                <th>Description</th>
                <th>Images</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $index => $location)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $location->destination->name }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->description }}</td>
                <td>
                    <img src="$location->images" width="50">
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection