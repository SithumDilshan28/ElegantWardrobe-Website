<?php session_start(); ?>
 <html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Elegant wardrobe/Register</title>
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="background.css">
  </head>
  <body>
  <div class="navBar">
        <div class="logo">
        <a href="index.php" class="name">ELEGANT WARDROBE</a>
     </div>
     <div class="nav-links">
        <ul>
        <li> <a href="index.php">Home</a> </li>
            <li> <a href ="Male_cloths.php"  >Male</a></li>
            <li> <a href="Female_cloths.php"> Female</a></li>
            <li> <a href="Kids_cloths.php"> Kids</a></li>
            
            <?php if( isset($_SESSION['type']) && !empty($_SESSION['type']) )
{
?><li><a href="logout.php">Log Out</a><li>
        
         
    <?php }else{ ?>
        <li> <a href="Login.php"> Login</a> </li>
        <li> <a href="Register.php" class='active' >Register</a> </li>
        
    <?php } ?>  
           </ul>
       </div>
   </div>
   <?php 
   include("connection.php");
if(isset($_POST['submit']))  { 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = "User";
    if ($fname==""||$lname==""||$email==""||$password==""||$cpassword==""||$user_type=="" )
    {
        $msg = "field cant empty";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    else if ($cpassword !== $password) {
        $error = "Passwords dose not match";
        echo "<script type='text/javascript'>alert('$error');</script>";
        header("refresh:0; url=Register.php");

    } else {
        $password = md5($password);
        $query = "insert into register(fname,lname,email,pass,type) ";
   $query .="values ('{$fname}', '{$lname}','{$email}','{$password}','{$user_type}' )";

   $result = mysqli_query($conn, $query);
  
   if(!$result) {
       die('Query Failed' . mysqli_error($conn));
   }
   else{
    header("Location:index.php");
   }
    }
}
?>
<section class='form_1'>  

  <div class="form">
      <br>
        <div class="Detail">
          <h1>Register Now</h1>
          <br>
          <form class="regForm" action="#" method="post">
            <div class="formGrp">
              <label class="labelGrp">First Name</label>
              <input class="achr" type="text" name="fname" value="" placeholder="Enter First Name" req>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Last Name</label>
              <input class="achr" type="text" name="lname" value="" placeholder="Enter Last Name" req>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Email</label>
              <input class="achr" type="text" name="email" value="" placeholder="Enter Email" req>
            </div>
            <div class="formGrp">
              <label class="labelGrp">Password</label>
              <input class="achr" type="text" name="password" value="" placeholder="Password">
            </div>
            <div class="formGrp">
              <label class="labelGrp">Confirm password</label>
              <input class="achr" type="text" name="cpassword" value="" placeholder="Confirm password">
            </div>
            <br>
          
            <div class="formGrp">
              <button class="achr regClass btn" type="submit" name="submit">Register</button>
            </div>
         
          </form>
        </div>
    </div>

</section>

  <?php include("footer.php");?>



  
  </body>

  
 
</html>


