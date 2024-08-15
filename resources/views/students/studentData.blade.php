<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<x-navbar />
<div class="container">
<h1 class="text-center display-4  mt-5 ">Student info</h1>
<table class="table m-auto my-5">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Address</th>
            <th scope="col">gender</th>
            <th scope="col">Email</th>
            <th scope="col">Track</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>
                @if ($student->image)
                    <img src="{{ asset('uploads/' . $student->image) }}" alt="student image" width="100">
                @else
                    not have image
                @endif
            </td>
            <td>{{ $student->address}}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->email }}</td>
            @if($student->track_id)
                <td><a href="{{route('tracks.show',$student->track_id)}}">{{ $student->track->name}}</a></td>
            @else
                <td>Not assigned</td>
            @endif
            <td>
                <a href="{{route('students.index')}}">
                    <x-action-button type="warning">Back</x-action-button>
                </a>

            </td>
        </tr>
    </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
