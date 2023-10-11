<?php

session_start();
echo "Profile";

if(isset($_SESSION["user_id"]))
{
    echo $_SESSION["user_id"];
}
else
{
    header("location:index.php");
    exit();
}
?>

<html>
<form action="" method="post">
    <button name="logout">Log out</button>
</form>

</html>

<?php

if(isset($_POST["logout"]))
{
    session_unset();
    session_destroy();
    header("location:index.php");
}

?>
