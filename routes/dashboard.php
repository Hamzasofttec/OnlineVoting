<?php
session_start();
If(!isset($_SESSION['userdata']))
{
    header("location:../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];


if($_SESSION['userdata']['status']==0){
    $status='<b style="color:green">Not Voted <?b>';
}
else{
    $status='<b style="color:green"> Voted <?b>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color:rgb(217, 217, 217);
        color:black;
    }
   
    #backbtn{
font-size: 15px;
padding: 10px;
border-radius: 10px;
width: 100px;
background-color: black;
color:white;
float:left;

    }
    #logoutbtn{
        font-size: 15px;
padding: 10px;
border-radius: 10px;
width: 100px;
background-color: black;
color:white;
float:right;

    }
    #backbtn:hover{
background-color:white;
color:black;
border-radius:5px solid black;  
}
#logoutbtn:hover{
background-color:white;
color:black;
border-radius:5px solid black;  
}
/* #profile{
    background:white;
    width:20%;
    padding:20px;
    margin-left:20px;
    margin-top:20px;
    border: 5px solid black;
    float:left;

} */

/* #votebtn{
    font-size: 15px;
    padding:5px;
    border-radius: 5px;
    width:50px;
    background-color: blue;
    color:white;
    float:left;
}
#group{
    background:white;
    width:65%;
    padding:20px;
    margin-left:20px;
    margin-top:20px;
    border: 5px solid black;
    float:right;

} */
</style>

<body >
    <div id="mainsection">
        <center>
            <div id="headersection">
                
              <a href=".../" >  <button id="backbtn">Back</button></a>
            
              <a href="logout.php" >   <button id="logoutbtn">Logout</button></a>
                <h1>Online voting System </h1>
    </div>
</center>
<hr>
<div id="profile">
    <center><img src="../uploads/<?php echo $userdata['image']?>"height="100" width="100"></center><br><br>
    <b>Name:</b><?php echo $userdata['name'] ?><br><br>
    <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
    <b>Address:</b><?php echo $userdata['address'] ?><br><br>
    <b>Status:</b><?php echo $status; ?><br><br>
    <div>
<hr>
<div id="group">
            <?php 
            if ($_SESSION['groupsdata']) {
                for ($i = 0; $i < count($groupsdata); $i++) {
            ?>
<div>
         <img style="float:right;" src="../uploads/<?php echo $groupsdata[$i]['image']; ?>" height="100" width="100">
                        <br><b>Group Name:</b> <?php echo $groupsdata[$i]['name']; ?><br><br>
                        <b>Votes:</b> <?php echo $groupsdata[$i]['votes']; ?><br><br>
                        <form action="../api/vote.php" method="post">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']; ?>">
                            <br>
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']; ?>">
                            <?php
                            if ($_SESSION['userdata']['status'] == 0) {
                            ?>
                                <input type="submit" name="votebtn" value="votes" id="votebtn"><br><br>
                            <?php
                            } else {
                            ?>
                                <button disabled style="color:white;paddind:10px;width:100px;background-color:red;height:30px;border-radius:5px;"  type="button" name="votebtn" value="votes" id="voted">Voted</button>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <hr>
            <?php
                }
            }
            ?>
        </div>
    </div>
    </div>
</body>
</html>