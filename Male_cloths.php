<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant wardrobe/Male</title>
    <link rel="stylesheet" href="product-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="background.css">

    <?php session_start(); ?>
</head>
<body>
    <div class="navBar">
        <div class="logo">
        <a href="index.php" class="name">ELEGANT WARDROBE</a>
     </div>
     <div class="nav-links">
        <ul>
        <li> <a href="index.php">Home</a> </li>
            <li> <a href ="Male_cloths.php" class='active' >Male</a></li>
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

     <div class="product">
     <?php include("connection.php");
            $query = "select * from mclothes";
            $select_all_fshop_query = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($select_all_fshop_query)){
            $id = $row['id'];
            $Name = $row['name'];
            $Discription = $row['discription'];
            $price = $row['price'];
            $Size = $row['size'];
            $Metirial = $row['metirial'];
            $Image = $row['file'];
?>

        <div class="item">
            <img src="img/<?php echo $Image ?>">
            <div class="action">
           <?php echo "<a href='View-Male-Cloths.php?view={$id}'>view</a>" ?>
            </div>
        </div>
        <?php } ?>
     </div>

    </section>

    <script src="js/script.js"></script>
    <?php include("footer.php");?>
    
</body>

<style>
    body {
    background-image:url(images/2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
</style>

</html>

