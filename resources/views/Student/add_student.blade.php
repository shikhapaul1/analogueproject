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
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white d-flex align-items-center">
      <h5 class="mb-0">Student Registration</h5>
      <a type="button" href="{{route('class.index')}}" class="btn btn-light btn-sm ms-auto">Back</a>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter name">
          @error('name')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email">
          @error('email')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="fname" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address"></textarea>        
              @error('address')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <select name="class" id="class" class="form-control" aria-label="Select Class">
                <option value="" disabled selected>- Select Class -</option>
                @foreach($class as $classes)
                    <option value="{{ $classes->class_id }}" {{ old('class_id') == $classes->class_id ? 'selected' : '' }}>
                        {{ $classes->name }}
                    </option>
                @endforeach
            </select>

            @error('class_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" name="image" placeholder="Enter name">
          @error('image')
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