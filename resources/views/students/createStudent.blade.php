<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <x-navbar />
  <div class="container">
    <h1 class="text-center mt-5 display-4">Create New Student</h1>
 
    <form class="border p-5 bordered w-75 m-auto my-5" method="post" action="{{route('students.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputName" class="form-label">Name</label>
          <input name="name" type="Name" class="form-control" id="exampleInputName" aria-describedby="NameHelp">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="studentemail">
        </div>


        <div class="mb-3">
          <label for="grade" class="form-label">Grade</label>
          <input name="grade" type="number" class="form-control" id="grade" aria-describedby="grade">
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
          <label for="address" class="form-label">Address</label>
          <input name="address" type="text" class="form-control" id="address" aria-describedby="address">
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Student Image</label>
          <input name="image" type="file" class="form-control" id="image" aria-describedby="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
