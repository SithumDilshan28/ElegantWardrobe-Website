<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Elegant wardrobe</title>
</head>
<body>

<div class="container">

<?php 
if(isset($_SESSION['type'])){

    if($_SESSION['type']  !=='User'){
    
    header("Location:./new_Admin/Admin-female-Add.php");
    }
    }
?>

    <div class="header">
        <div class="navBar">
     <div class="logo">
     <a href="index.php" class="name">ELEGANT WARDROBE</a>
     </div>
     <div class="nav-links">
        <ul>
        <li> <a href="index.php" class='active'>Home</a> </li>
            <li> <a href ="Male_cloths.php">Male</a></li>
            <li> <a href="Female_cloths.php"> Female</a></li>
            <li> <a href="Kids_cloths.php"> Kids</a></li>
            
            <?php if( isset($_SESSION['type']) && !empty($_SESSION['type']) )
{
?><li><a href="logout.php">Log Out</a><li>
        
         
    <?php }else{ ?>
        <li> <a href="Login.php"> Login</a> </li>
        <li> <a href="Register.php">Register</a> </li>
        
    <?php } ?>  
        </ul>
    </div>
</div>

<section>
    
    <img src="images/back.jpg" id="background"> 
   
    
    </section>

    <?php include("footer.php");?>

    </div>

</body>

</html>