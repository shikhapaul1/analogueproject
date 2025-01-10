<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    </head>
<body>
   


      <div class="container mt-5">
      <div class="d-flex justify-content-between mb-3">
  <!-- Add Student Button -->
  <div>
  <a href="{{ route('class.add') }}" class="btn btn-primary">+ Add Class</a>
  </div>
  
  <!-- Add Class Button -->
  <div>
    <a href="{{route('index')}}" class="btn btn-primary">View Student</a>
  </div>
</div>
  <!-- Add User Button -->


  <!-- User Table -->
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h5>Class List</h5>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">Sl. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($class as $classes)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$classes->name}}</td>
            <td>
              <a href="{{route('edit_class', [$classes->class_id])}}" class="btn btn-success btn-sm ">Edit</a>
              <!-- Example using Bootstrap for styling -->
              <form action="{{route('class.destroy', $classes->class_id)}}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this class?')">
                      Delete
                  </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><script>
     @if(session('success'))
        toastr.success("{{ session('success') }}");
    @elseif(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>