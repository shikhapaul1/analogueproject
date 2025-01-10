<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
   
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white d-flex align-items-center">
      <h5 class="mb-0">User Information</h5>
      <a href="{{route('index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <!-- Display Name -->
      <div class="mb-3">
        <label class="form-label"><b>Name</b></label>
        <p class="form-control-static">{{ $data->name }}</p>
      </div>

      <!-- Display Email -->
      <div class="mb-3">
        <label class="form-label"><b>Email</b></label>
        <p class="form-control-static">{{ $data->email }}</p>
      </div>

      <!-- Display Address -->
      <div class="mb-3">
        <label class="form-label"><b>ddress</b></label>
        <p class="form-control-static">{{ $data->address }}</p>
      </div>

      <!-- Display Class -->
      <div class="mb-3">
        <label class="form-label"><b>Class</b></label>
        <p class="form-control-static">{{ $data->Class->name ??'' }}</p>
      </div>
     
      <!-- Display Class -->
      <div class="mb-3">
        <label class="form-label"><b>Creation Date</b></label>
        <p class="form-control-static">{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</p>
      </div>

      <!-- Display Image -->
      <div class="mb-3">
        <label class="form-label"><b>Image</b></label><br>
        @if($data->image)
        <img src="{{ asset($data->image) }}" style="height:100px; width: 100px;" alt="Student Image">
        @else
          <p>No image uploaded.</p>
        @endif
      </div>

    </div>
  </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>