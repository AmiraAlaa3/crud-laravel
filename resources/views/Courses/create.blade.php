<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <x-navbar />
  <div class="container">
    <h1 class="text-center mt-5 display-4">Create New Course</h1>
 
    <form class="border p-5 bordered w-75 m-auto my-5" method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputName" class="form-label">Name</label>
          <input name="name" type="Name" class="form-control" id="exampleInputName" aria-describedby="NameHelp">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
          <label for="Description" class="form-label">Description</label>
          <input name="description" type="text" class="form-control" id="Description" aria-describedby="Description">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
          <label for="grade" class="form-label">Grade</label>
          <input name="totalGrade" type="number" class="form-control" id="grade" aria-describedby="grade">
        </div>
        @error('totalGrade')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
