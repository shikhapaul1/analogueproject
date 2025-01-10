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
      <h5 class="mb-0">Student Registration</h5>
      <a type="button" href="{{route('index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('student_post') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Enter your first name">
          @error('name')
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
          <label for="Address" class="form-label">Address</label>
          <input type="text" id="Address" class="form-control" name="Address" placeholder="Enter your Address">
          @error('Address')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="class" class="form-label">Select Class</label>
          <select class="form-control" name="class">
              <option value="">-- Select a Class --</option>
              @foreach($classes as $class)
              <option value="{{$class->class_id}}">{{$class->name}}</option>
              @endforeach
          </select>          
          @error('class')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" name="image">
          @error('image')
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