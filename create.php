<?php
//ceating connection database 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'emp';

$conn = new mysqli($servername , $username , $password , $dbname);
if($conn === false){
  die("connection failed".$conn->connect_error);
}

//error message 
$errorMessage = "";
$successMessage = "";

//form handling and user input check
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = $conn->real_escape_string($_REQUEST["name"]);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$address = $conn->real_escape_string($_POST['address']);
$create_time = $conn->real_escape_string($_POST['create_date']);

//checking if inputs in empty
do{
  if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($create_time)){
    $errorMessage = "All the input fields are required!";
    break;
  } 

  //inserting data in database 
  $sql = "insert into emp(name , email , phone , address , created_at)
  values ('$name' , '$email' , '$phone' , '$address' , '$create_time')";

  $result = $conn->query($sql);

  if(!$result){
    $errorMessage = "Invalid query: " . $conn->error;
    break;
  }

  //inserting data into the database
  $successMessage = "Employee added correctely";

  //redirectory page
  header("location:/employee/index.php");
  exit;
  
}while(false);

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2>Create New Employee</h2>

        <?php
              // error message displayed position
          if(!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
          }
              ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control w-50">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"  name="email" class="form-control w-50">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control w-50" name="phone">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text"  name="address" class="form-control w-50">
            </div>
            <div class="mb-3">
                <label class="form-label">Create-Time</label>
                <input type="date" name="create_date" class="form-control w-50">
            </div>

            <?php
            //display successfull message for data insertion
            if(!empty($successMessage)){
              echo "
                <div class='alert alert-success alert-dismissible fade show  w-50' role='alert'>
                 <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
              ";
            }

            ?>

              <button type="submit" class="btn btn-primary  btn-sm gap-2  fs-6">Save</button>
              <button type='reset' class="btn btn-danger  btn-sm  gap-2 fs-6">Cancel</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>