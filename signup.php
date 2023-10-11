<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | No Dues</title>
</head>
<body>

    <form action="" method="POST">
        <h1>Sign Up</h1>
        <div>
            <label for="">
                User Id
            </label>
            <input type="text" name="uid">
        </div>
        <div>
            <label for="">
                Name
            </label>
            <input type="text" name="uname">
        </div>
        <div>
            <label for="">
                Password
            </label>
            <input type="password" id="pass1" name="pass">
        </div>
        <div>
            <label for="">
                Confirm Password
            </label>
            <input type="password" id="pass2" name="cpass">
        </div>
        <button type="submit" disabled id="submit" name="sign-up">
            Sign up
        </button>
    </form>

    <script>
        document.getElementById("pass2").addEventListener("input",function(){
            if(document.getElementById("pass1").value !== document.getElementById("pass2").value)
                document.getElementById("submit").disabled = true
            else
                document.getElementById("submit").disabled = false
        })

    </script>

</body>
</html>

<?php

$db = mysqli_connect("localhost","root","","nodue");

if(!$db)
    die("Connection error : " . mysqli_connect_error);

if(isset($_POST["sign-up"]))
{
    $userid = $_POST["uid"];
    $passwrd = $_POST["pass"];
    $uname = $_POST["uname"];
    
    $query = "insert into student (rollno, name, dob) values ('$userid','$passwrd','$uname')";
    if(mysqli_query($db, $query))
        echo "sign up succussfully <br> <a href='index.php'>Login here</a>";
    else    
        echo "User Id already exists.";

}

?>