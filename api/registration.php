<?php
include ("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_image = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];


if($password==$cpassword)
{
    move_uploaded_file($tmp_image,"../uploads/$image");
    $insert=mysqli_query($connect,"INSERT INTO register (name,mobile,address,password,cpassword,image,role,status,votes) VALUES('$name','$mobile','$address','$password','$cpassword','$image','$role',0,0)" );
    
    if($insert)
    {
        echo 
        '
    <script>
    alert("registration successfull");
    window.location="../";
    </script>';
    }

    else
    {
        echo '
    <script>
    alert("some error occured");
    window.location="../index.html";
    </script>
    ';

    }
}
else
{
    echo '
    <script>
    alert("paaword and confirm password does not match");
    window.location="../routes/register.html";
    </script>
';
}
?>





