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
    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1 class="display-4">All Students</h1>
        <a href="{{ route('students.create') }}">
            <x-action-button type="primary">Create New Student</x-action-button>
        </a>
    </div>
    <table class="table m-auto my-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Address</th>
                <th scope="col">gender</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    @if ($student->image)
                        <img src="{{ asset('uploads/' . $student->image) }}" width="100" height="100" alt="student image" >
                    @else
                        not have image
                    @endif
                </td>
                <td>{{ $student->address}}</td>
                <td>{{ $student->gender }}</td>
                <td>
                    <a href="{{route('students.show', $student->id) }}">
                        <x-action-button type="success" >Show</x-action-button>
                    </a>
                    <a href="{{route('students.edit',$student->id)}}">
                        <x-action-button type="warning">Edit</x-action-button> 
                    </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
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
