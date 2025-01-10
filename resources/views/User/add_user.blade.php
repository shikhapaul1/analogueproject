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
      <h5 class="mb-0">User Registration</h5>
      <a type="button" href="{{route('index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('post') }}">
        @csrf
        <div class="mb-3">
          <label for="fname" class="form-label">First Name</label>
          <input type="text" id="fname" class="form-control" name="fname" placeholder="Enter your first name">
          @error('fname')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" id="lname" class="form-control" name="lname" placeholder="Enter your last name">
          @error('lname')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email">
          @error('email')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="mobile" class="form-label">Mobile Number</label>
          <input type="number" id="mobile" class="form-control" name="mobile" placeholder="Enter your mobile number">
          @error('mobile')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>