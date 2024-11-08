<?php
$conn = new mysqli("localhost","root","","std_db");

if($conn -> connect_error){

    die("Connection Failed : ". $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $regno=$_POST['regno'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $course=$_POST['course'];
    switch($_POST['action']){
        case 'Add':
        $sql = "INSERT INTO student VALUES('$regno','$name','$age','$course')";
        break;
    }
    if ($conn -> query($sql)==FALSE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

function displaystudents($conn){
    $sql = "SELECT * FROM student";
    $result=$conn->query($sql);


    if ($result->num_rows >0){
        echo "<table border ='1'
        <tr>
        <th>Regno</th>
        <th>Age</th>
        <th>course</th>
        </tr>";
        while($row=$result->fetch_assoc()){

            echo "<tr><td>".$row["regno"] .
            "</td><td>".$row["name"] .
            "</td><td>".$row["age"] .
            "</td><td>".$row["course"] .
            "</td></tr>";
        }
        echo "</table>";                      
    }else{
        echo "0 results";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student database management</title>
</head>
<body>
    <h1>Manage Students</h1>
    <form method="post">
        regno:<input type="text" name="regno" requiered><br><br>
        name:<input type="text" name="name" ><br><br>
        age:<input type="text" name="age" ><br><br>
        course:<input type="text" name="course" ><br><br>
        <input type="submit" name="action" value="Add">
    </form>

    <?php
    displaystudents($conn);
    $conn->close();

    ?>
    
</body>
</html>