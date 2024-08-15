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
    <h1 class="text-center mt-5 display-4">Edit student {{$student->id}}</h1>
    <form class="border p-5 bordered w-75 m-auto my-5" method="post" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input name="name" type="Name" value={{$student->name}}  class="form-control" id="name" aria-describedby="name">

        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" value={{$student->email}} class="form-control" id="email" aria-describedby="email">
        </div>


        <div class="mb-3">
          <label for="grade" class="form-label">Grade</label>
          <input name="grade" type="number" value={{$student->grade}} class="form-control" id="grade" aria-describedby="grade">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address </label>
          <input name="address" type="text" value={{$student->address}} class="form-control" id="address" aria-describedby="address">
        </div>

        <label class="form-check-label" for="flexRadioDefault1">
            Gender
        </label>
        <div class="form-check">
            <input name="gender" class="form-check-input" type="radio"  id="flexRadioDefault1" value="male">
            <label class="form-check-label" for="flexRadioDefault1">
              male
            </label>
        </div>
        <div class="form-check mb-3">
            <input name="gender" class="form-check-input" type="radio"   id="flexRadioDefault2" value="female" >
            <label class="form-check-label" for="flexRadioDefault2">
              Female
            </label>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="track_id">
                <option selected disabled value="">{{ $student->track->name}}</option>
                @foreach ($tracks as $track )
                <option value="{{$track->id}}">{{$track->name}}</option>
                @endforeach
              </select>
         </div>
        <div class="mb-3">
            <label for="image" class="form-label">Student image</label>
            <input name="image" type="file" class="form-control" id="image">
            @if($student->image)
                <img src="{{ asset('uploads/' . $student->image) }}" alt="image" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
