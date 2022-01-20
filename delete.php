<?php
    include_once 'connection.php';

$id=$_GET["id"];

 mysqli_query($conn, "DELETE FROM users WHERE id=$id");


?>

<script type="text/javascript">
window.location="index.php";
</script>
