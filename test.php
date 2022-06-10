
<?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "assignment"; 
$id = '';
 
$con = mysqli_connect($host, $user, $password,$dbname);
 
$method = $_SERVER['REQUEST_METHOD'];
 
 
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

switch ($method) {
      case 'GET':
        $sql = "SELECT * from `account`"; 
        break;
      case 'POST':
        $id = $_POST["ID"];
        $username = $_POST["UserName"];
        $password = $_POST["PassWord"];
        $role = $_POST["ROLE"];
   
        $sql = "insert into contacts  values ('$id', '$username', '$password', '$role')"; 
        break;
  }
   
  // run SQL statement
  $result = mysqli_query($con,$sql);
   
  // die if SQL statement failed
  if (!$result) {
    http_response_code(404);
    die(mysqli_error($con));
  }
   
  if ($method == 'GET') {
      if (!$id) echo '[';
      for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
        echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
      }
      if (!$id) echo ']';
    } elseif ($method == 'POST') {
      echo json_encode($result);
    } else {
      echo mysqli_affected_rows($con);
    }
 
$con->close();