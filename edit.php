<?php
//create connention database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'emp';
$conn = new mysqli($servername , $username , $password , $dbname);
if($conn === false){
    die("connection field: ".$conn->connect_error);
}

$id = '';
$name = '';
$email = '';
$phone = '';  $address = ''; $created_date ='';

$errorMessage = "" ;
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(!isset($_GET["id"])){
        header("location:/employee/index.php");
        exit;
    }

    $id = $_GET["id"];  

    $sql = "select * from emp where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   
    if(!$row){
        header("location:/employee/index.php");
        exit;
    }

    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $created_date = $row['created_at'];

}else{

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $created_date = $_POST["create_date"];

do{
    if(empty($id) && empty($name) && empty($email) && empty($phone) && empty($address) && empty($creeated_date)){
        $errorMessage = "All input fields are required!";
        break;
    }

    $sql = "update emp set name = '$name' , email= '$email' , phone= '$phone' , address= '$address' , created_at= '$created_date' where id=$id";

    $result = $conn->query($sql);
    
    if(!$result){
        $errorMessage = "invalid query: " . $conn->error;
        break;
    }
    $successMessage = "employee updated";
    
    header("location:/employee/index.php");
    exit;
}while(true);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2>Update Employee</h2>

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
            <input type="header" name="id"  value="<?php echo $id ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control w-50"  value="<?php echo $name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"  name="email" class="form-control w-50"  value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control w-50" name="phone" value="<?php echo $phone ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text"  name="address" class="form-control w-50" value="<?php echo $address ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Create-Time</label>
                <input type="date" name="create_date" class="form-control w-50" value="<?php echo $created_date ?>">
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
              <button type="submit" class="btn btn-primary  btn-sm gap-2  fs-6">Edit</button>
              <button type='reset' class="btn btn-danger  btn-sm  gap-2 fs-6">Cancel</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>