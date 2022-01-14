  <?php  include 'connection.php'; ?>
<!DOCTYPE html>


<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class ="col-lg-4 mb-5">
  <h2>Dodawanie do bazy danych - Paweł Bilski</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="firstname">Imię:</label>
      <input type="text" class="form-control" id="firstname" placeholder="wpisz imię" name="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Nazwisko:</label>
      <input type="text" class="form-control" id="lastname" placeholder="wpisz nazwisko" name="lastname">
    </div>
   
    <button type="submit" name="insert" class="btn btn-default">Dodaj</button>
    <button type="submit" name="update" class="btn btn-default">Edytuj</button>
    <button type="submit" name="delete" class="btn btn-default">Usuń</button>
  </form>
</div>

</div>


<div class ="col-lg-6">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include_once 'connection.php';
    $res=mysqli_query($conn, "select * from users");
    while($row=mysqli_fetch_array($res))
    
    {
    echo "<tr>";
        echo "<td>"; echo $row["id"]; echo "</td>";
    echo "<td>"; echo $row["firstname"]; echo "</td>";
    echo "<td>"; echo $row["lastname"]; echo "</td>";
    echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edytuj</button></a> <?php echo "</td>";
    echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Usuń</button></a> <?php echo "</td>";
    
    echo "</tr>";
    }
    ?>
  </tbody>
</table>
</div>

</body>



<?php
include_once 'connection.php';
if(isset($_POST['insert']))
{    
     $name = $_POST['firstname'];
     $lastname = $_POST['lastname'];

     $sql = "INSERT INTO users (firstname,lastname)
     VALUES ('$name','$lastname')";
     if (mysqli_query($conn, $sql)) {
        echo "Użytkownik został dodany do bazy";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
        ?> 
      <script type="text/javascript">
     window.location.href=window.location.href;
     </script>
     <?php

}

if(isset($_POST['delete']))
{
  $res=mysqli_query($conn, "delete from users where firstname='$_POST[firstname]'");
      ?> 
      <script type="text/javascript">
     window.location.href=window.location.href;
     </script>
     <?php
}



if(isset($_POST['update']))
{
  $res=mysqli_query($conn, "update users set firstname='$_POST[firstname]' where firstname='$_POST[firstname]'");
     ?> 
      <script type="text/javascript">
     window.location.href=window.location.href;
     </script>
     <?php
}
?>






</html>
