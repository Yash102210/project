<?php
session_start();
if(!isset($_SESSION['userdata']) && empty($_SESSION['userdata'])){
    header("location: ../index.html");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color: red">Not Voted</b>';
}
else{
    $status = '<b style="color: green">Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../Css/style.css">
      
</head>
<body>
    <style>
        #backbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            font-size: 15px;
            float: left;
        }
        #logoutbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: red;
            color: white;
            font-size: 15px;
            float: right;
        }
        #Profile{
            background-color: white;
            padding: 20px;
            width: 30%;
            float: left;
        }
        #Group{
            background-color: white;
            padding: 20px;
            width: 60%;
            float: right;
        }
        #votebtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            font-size: 15px;
        }
        img{
            float: right;
        }
        #mainpannel{
            padding: 10px;
        }
        #voted{
            padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 15px;
        }
         
    </style>
    <div id="mainsection"> 
        <center>
    <div id="headersection"> 

    <a href="../index.html"><button id="backbtn">Back</button></a>
    <a href="../Routes/logout.php" id="logoutbtn">Logout</button></a>
    <h1>Online Voting System</h1>       
    </center>
    </div>
    
    <hr>

    <div id="mainpannel"> 
    <div id="Profile">
        <center><img src="../Uploads/<?php echo $userdata['photo'] ?>" hight="100" width="100"></center><br><br>

        <b>Name:</b><?php echo $userdata['name'] ?><br><br>
        <b>Mobile No:</b><?php echo $userdata['mobile'] ?><br><br>
        <b>Address:</b><?php echo $userdata['address'] ?><br><br>
        <b>Status:</b><?php echo $status ?><br><br>
    </div>

    <div id="Group">
        <?php
        if($_SESSION['groupsdata']){
            for ($i=0; $i<count($groupsdata); $i++){
            ?>
            
                <div>
                <img src="../Uploads/<?php echo $groupsdata[$i]['photo'] ?>" hight="100" width="100"><br><br>
                 <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                 <b>Votes:</b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                 <form action="../API/vote.php" method="post">
                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                    <?php
                    if($_SESSION['userdata']['status']==0){
                        ?>
                        <input type="submit" name="votebtn" value="vote" id="votebtn">
                        <?php
                    }
                    else{
                        ?>
                        <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                    <?php
                    }
                    ?>
                     
                 </form>
                </div>
                <hr>
               <?php 
                    
                }
            }
        else{

        }

            
        ?>
    
</div>
    </div>
    </div>

    
</body>
</html>