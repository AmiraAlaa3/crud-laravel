<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<x-navbar />
<div class="container">
<h1 class="text-center mt-5 display-4">Track info</h1>
<table class="table mt-5">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Track Type</th>
            <th scope="col">Location</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $track->id }}</td>
            <td>{{ $track->name }}</td>
            <td>
                @if ($track->logo)
                    <img src="{{ asset('uploads/' . $track->logo) }}" alt="Logo" width="100">
                @else
                    No Logo
                @endif
            </td>
            <td>{{ $track->track_type }}</td>
            <td>{{ $track->branch_name }}</td>
            <td>{{ $track->description }}</td>
            <td>
                <a href="{{route('tracks.index')}}">
                  <button class="btn btn-warning">Back</button>
                 </a>
             </td>
        </tr>
       
    </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
