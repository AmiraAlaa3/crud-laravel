<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <x-navbar />
  <div class="container">
    <h1 class="text-center mt-5 display-4">Edit Track {{$track->id}}</h1>
    <form class="border p-5 bordered w-75 m-auto my-5" method="post" action="{{ route('tracks.update', $track->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="exampleInputName" class="form-label">Name</label>
          <input name="name" type="Name" value={{$track->name}}  class="form-control" id="exampleInputName" aria-describedby="NameHelp">

        </div>

        <div class="mb-3">
          <label for="exampleInputnum" class="form-label">Students Numbers</label>
          <input name="student_numbers" type="number" value={{$track->student_numbers}} class="form-control" id="exampleInputnum" aria-describedby="studentNumbers">
        </div>


        <div class="mb-3">
          <label for="exampleInputbranchname" class="form-label">Branch Name </label>
          <input name="branch_name" type="text" value={{$track->branch_name}} class="form-control" id="exampleInputbranchname" aria-describedby="branch_name">
        </div>

        <div class="mb-3">
          <label for="exampleInputtracktype" class="form-label">Track Type </label>
          <input name="track_type" type="text" value={{$track->track_type}} class="form-control" id="exampleInputtracktype" aria-describedby="track_type">
        </div>

        <div class="mb-3">
          <label for="exampleInputtrack_status" class="form-label">Track Status </label>
          <input name="track_status" type="text" value={{$track->track_status}} class="form-control" id="exampleInputtrack_status" aria-describedby="status">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input name="logo" type="file" class="form-control" id="logo">
            @if($track->logo)
                <img src="{{ asset('uploads/' . $track->logo) }}" alt="Logo" width="100" class="mt-2">
            @endif
        </div>
        
        <div class="mb-3">
            <label for="exampleInputdescription" class="form-label">Description</label>
            <input name="description" type="text" value={{$track->description}}  class="form-control" id="exampleInputdescription" aria-describedby="description">
        </div>
          
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
