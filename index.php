<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | No Dues</title>
</head>
<body>
    
    <form action="" method="POST">
        <h1>Login Page</h1>
        <div>
            <label for="">
                User Id
            </label>
            <input type="text" name="userid">
        </div>
        <div>
            <label for="">
                Password
            </label>
            <input type="password" name="passwrd">
        </div>
        <button type="submit" name="submit">
            Sumbit
        </button>

    </form>
    
    <?php

        if(isset($_SESSION["login_error"] ))
        {
            echo "<div class='error'>" . $_SESSION['login_error'] . "</div>";
            unset($_SESSION['login_error']);
            echo "<a href='signup.php'>Create new account here</a>";
        }

    ?>

</body>
</html>

<?php

$con=mysqli_connect("localhost","root","","nodue");
if (!$con)
{
    die("Connection error : ". mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $userid = $_POST['userid'];
    $passwrd = $_POST['passwrd'];

    $query = "SELECT * FROM student WHERE rollno='$userid' and dob='$passwrd'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);  
    
    if($count == 1)
    {  
        echo "<h1> Successfully Logged in </h1>";
        $_SESSION["user_id"] = $userid;
        header("location:profile.php");
    }  
    else
    {  
        echo "<h1> wrong password or userid. </h1>";
        $_SESSION["login_error"] = "Your Userid or Password is wrong." ;
        header("location:login.php");
    }     
}
?>
