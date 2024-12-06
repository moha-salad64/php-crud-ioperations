<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body> 
    <div class="container">
        <h2>Create New Employee</h2>

<form method="post">

<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" id="name">
    </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" id="email">
    </div>
 <div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="number" class="form-control" id="phone">
  </div>
  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" id="address">
    </div>
  <div class="mb-3">
    <label class="form-label">Create-Time</label>
    <input type="date" class="form-control" id="create_date">
    </div>

  <a href='/employee/index.php'  class="btn btn-primary  btn-sm  px-5 fs-6">Save</a>
</form>

    </div>

</body>
</html>