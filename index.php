<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERASIONS IN PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-3">
        <h2>List of Employee</h2>
        <a class="btn btn-primary btn-sm p-1 fw-bold my-2" href="/employee/create.php" >New Employee</a>
        <table  class='table table-striped table-bordere'>
            <th>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>E-MAIL</td>
                    <td>PHONE</td>
                    <td>ADDRESS</td>
                    <td>CREATE-at</td>
                    <td>ACTION</td>
                    </tr>
            </th>
            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'emp';

                //creationg connection database
                $conn = new mysqli($servername , $username , $password , $dbname);
                if($conn === false){
                    die("connection failed". $conn->connection_error);
                }
                //creating query that select data from database;
                $sql = "select * from emp";
                $result = $conn->query($sql);
                if(!$result){
                    die("invalid query: " . $conn->error);
                }

                //reteriving data 
                while($row = $result->fetch_array()){
                    echo "
                    <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>
                    <a class='btn btn-success btn-sm' href='/employee/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/employee/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
        </table>
    </div>
 
</body>
</html>