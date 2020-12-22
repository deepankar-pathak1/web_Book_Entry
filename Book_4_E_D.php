<?php

include 'book_2.php';



echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM book WHERE id=" . $_POST['userid'];
    if($conn->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully delete user</div>";
    }
}


$sql = "SELECT * FROM book";
$result = $conn->query($sql);


if( $result->num_rows > 0)
{
?>
<html>
<head>
<title>LIST</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia|Trirong">
</head>
<style>

  h2{padding: 5px;
  text-align: center;
  font-family: "Sofia", sans-serif;
  }
</style>
<h2>List of all Users</h2>
<table class="table table-bordered table-striped">
    <tr>
        <td>Email</td>
        <td>Password</td>
        <td>Repeat_Password</td>
        
        <td width="70px">Delete</td>
        <td width="70px">EDIT</td>
    </tr>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST'>"; //added
        echo "<input type='hidden' value='". $row['id']."' name='userid' />"; //added
        echo "<tr>";
        echo "<td>".$row['email'] . "</td>";
        echo "<td>".$row['psw'] . "</td>";
        echo "<td>".$row['pswrepeat'] . "</td>";
    
        echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
        echo "<td><a href='insert_1.php?id=".$row['id']."' class='btn btn-info'>Edit</a></td>";
        echo "</tr>";
        echo "</form>"; //added
    }
?>
</table>
</head>
<?php
}
else
{
    echo "<br><br>No Record Found";
}
?>

