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
   


      <div class="heading">
        <h1 class="text-center">User Data</h1>
      </div>
      <div class="container mt-5">
  <!-- Add User Button -->
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('add_user') }}" class="btn btn-primary">+ Add User</a>
  </div>

  <!-- User Table -->
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h5>User List</h5>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">Sl. No.</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Email ID</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getdata as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->first_name }}</td>
            <td>{{ $data->last_name }}</td>
            <td>{{ $data->mobile_number }}</td>
            <td>{{ $data->email_id }}</td>
            <td>
              <a href="{{ route('edit_user', [$data->id]) }}" class="btn btn-success btn-sm ">Edit</a>
              <a href="{{ route('delete', [$data->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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