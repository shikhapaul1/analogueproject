<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
   
<div class="container mt-5">
  <div class="card shadow-lg car-themed-card">
    <div class="card-header bg-primary text-white d-flex align-items-center">
      <h5 class="mb-0">Student Information</h5>
      <a type="button" href="{{route('student.index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <!-- Name Field -->
      <div class="mb-3">
        <label class="form-label"><b>Name</b></label>
        <p class="form-control-static">{{$student->name}}</p>
      </div>

      <!-- Email Field -->
      <div class="mb-3">
        <label class="form-label"><b>Email</b></label>
        <p class="form-control-static">{{$student->email}}</p>
      </div>

      <!-- Address Field -->
      <div class="mb-3">
        <label class="form-label"><b>Address</b></label>
        <p class="form-control-static">{{$student->address}}</p>
      </div>

      <!-- Creation Date -->
      <div class="mb-3">
        <label class="form-label"><b>Creation date</b></label>
        <p class="form-control-static">{{ $student->created_at->format('Y-m-d') }}</p>
      </div>

      <!-- Class Field -->
      <div class="mb-3">
        <label class="form-label"><b>Class</b></label>
        <p class="form-control-static">
            {{$student->class->name}}
        </p>
      </div>

      <!-- Image Display -->
      <div class="mb-3">
        <label class="form-label"><b>Image</b></label>
        <div class="car-image-container">
          <img src="{{ asset($student->image) }}" style="height:100px; width:100px;" class="img-fluid car-image">
        </div>
      </div>
    </div>
  </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>