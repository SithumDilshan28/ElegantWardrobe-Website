<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="log.css">
    <title>Elegant wardrobe/Login</title>
    <link rel="stylesheet" href="style.css">
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
            <li> <a href ="Male_cloths.php"  >Male</a></li>
            <li> <a href="Female_cloths.php"> Female</a></li>
            <li> <a href="Kids_cloths.php"> Kids</a></li>
            
            <?php if( isset($_SESSION['type']) && !empty($_SESSION['type']) )
{
?><li><a href="logout.php">Log Out</a><li>
        
         
    <?php }else{ ?>
        <li> <a href="Login.php" class='active' > Login</a> </li>
        <li> <a href="Register.php">Register</a> </li>
        
    <?php } ?>  
           </ul>
       </div>
   </div>
<center>
<?php
include("connection.php");
if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
   
    $DB_username = "";
    $password = md5($password);
    $query = "select * from register where email ='{$username}' ";
    $select_user_query = mysqli_query($conn, $query);
    if (!$select_user_query) {

        die("query failed" . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_array($select_user_query)) {

        $DB_username = $row['email'];
        $DB_password = $row['pass'];
        $DB_usertype = $row['type'];
    }
    if ($username !== $DB_username && $password !== $DB_password) {
        $msg = "Username or password is not Valid";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=login.php");
    } elseif ($username == $DB_username && $password == $DB_password) {
        $msg = "Login Succses";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=index.php");

        $_SESSION['type'] = $DB_usertype;
    }
    else{
        $msg = "Error Login";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=login.php");
    }
}
?>
	
	<form action="" method="POST">
           <div class="card">
           
           <div class="container">
           <br>
            <br>
		    <h2><b>Login</b></h2>
            <br>
            <div class="input-field">
                <input type="text" id="username" class="textbox"
                    placeholder="Enter Your Username" name="name">
            </div>
            <br>
            <div class="input-field">
                <input type="password" class="textbox" id="password"
                    placeholder="Enter Your Password" name="password">   
            </div>

            <button class="btn_signin" id="sub" name="login" type="submit">Submit</button>
            
        
        </form>
</center>

<?php include("footer.php");?>
</body>
</html>


        