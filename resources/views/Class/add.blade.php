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
      <h5 class="mb-0">Class Registration</h5>
      <a type="button" href="{{route('index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('add_class') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Enter name">
          @error('name')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-end">
          <input type="submit" value="Submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>