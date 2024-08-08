<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<x-navbar />
<div class="container">
<div class="d-flex justify-content-between align-items-center mt-5">
    <h1 class="display-4">All Tracks</h1>
    <a href="{{ route('tracks.create') }}">
        <x-action-button type="primary">Create New Track</x-action-button>
    </a>
</div>
<table class="table m-auto my-5">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Student Numbers</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarcks as $tarck)
        <tr>
            <td>{{ $tarck->id }}</td>
            <td>{{ $tarck->name }}</td>
            <td>
                @if ($tarck->logo)
                    <img src="{{ asset('uploads/' . $tarck->logo) }}" alt="Logo" width="100" height="100">
                @else
                    No Logo
                @endif
            </td>
            <td>{{ $tarck->student_numbers }}</td>
            <td>
                <a href="{{route('tracks.show', $tarck->id) }}">
                    <x-action-button type="success" >Show</x-action-button>
                </a>
                <a href="{{route('tracks.edit',$tarck->id)}}">
                    <x-action-button type="warning">Edit</x-action-button> 
                </a>
                <form action="{{ route('tracks.destroy', $tarck->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this track?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
