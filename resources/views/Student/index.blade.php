<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    </head>
<body>
   

      <div class="container mt-5">
      <div class="d-flex justify-content-between mb-3">
    <!-- Left Side Button -->
    <a href="{{route('class.index')}}" class="btn btn-primary">Class</a>

    <!-- Right Side Button -->
    <a href="{{ route('student.add') }}" class="btn btn-primary">+ Add Student</a>
</div>


  <!-- User Table -->
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h5>Student List</h5>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">Sl. No.</th>
            <th scope="col"> Name</th>
            <th scope="col"> Email</th>
            <th scope="col"> Class</th>
            <th scope="col"> Image</th>
            <th scope="col"> Created at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->class->name??''}}</td>
            <td><img src="{{ asset($student->image) }}" style="height:100px; width:100px;" class="img-fluid"></td>
            <td>{{ $student->created_at->format('Y-m-d') }}</td>
            <td class="text-center">
    <!-- Edit Button with Tooltip -->
    <a href="{{route('student.edit', [$student->id])}}" class="btn btn-success btn-sm mr-2" data-toggle="tooltip" title="Edit Class">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="{{route('student.view', [$student->id])}}" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" title="Edit Class">
        <i class="fas fa-edit"></i> View
    </a>
    
    <!-- Delete Button with Tooltip -->
    <form action="{{route('student.delete', $student->id)}}" method="POST" class="d-inline-block" onsubmit="return confirmDelete()">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" >
            <i class="fas fa-trash-alt"></i> Delete
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
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this student?");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>