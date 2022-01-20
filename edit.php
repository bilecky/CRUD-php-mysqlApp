  <?php  
    include_once 'connection.php';

$id=$_GET["id"];
  
  $firstname = "";
  $lastname = "";
  
  
  $res=mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
  while($row=mysqli_fetch_array($res))
  {
  $firstname = $row["firstname"];
    $lastname = $row["lastname"];
  }
  ?>
  
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
  <h2>Edycja użytkownika</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="firstname">Imię:</label>
      <input type="text" class="form-control" id="firstname" placeholder="wpisz imię" name="firstname" value="<?php echo $firstname; ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Nazwisko:</label>
      <input type="text" class="form-control" id="lastname" placeholder="wpisz nazwisko" name="lastname"value="<?php echo $lastname; ?>">
    </div>
   

    <button type="submit" name="update" class="btn btn-default">Zatwierdź edycję</button>

  </form>
</div>

</div>



</div>

<?php

if(isset($_POST["update"]))

{
mysqli_query($conn, "update users set firstname='$_POST[firstname]', lastname='$_POST[lastname]' where id=$id");

?> 
<script type="text/javascript"> window.location="index.php" </script>     
<?php
}

?>

</body>










</html>
