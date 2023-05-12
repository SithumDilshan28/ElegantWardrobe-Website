<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php include("connection.php");
  ?>

  <?php 
$ID = 0;
        if(isset($_GET['view'])){
        $id = $_GET['view'];
        }
           $query = "select * from fclothes where id = '$id'";
           $update = mysqli_query($conn,$query);

           while($row = mysqli_fetch_assoc($update)) {
            $id = $row['id'];
            $Name = $row['name'];
            $Discription = $row['discription'];
            $price = $row['price'];
            $Size = $row['size'];
            $Metirial = $row['metirial'];
            $qty = $row['qty'];
            $img = $row['file'];

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


    <div class="form1">
      <br>
        <div class="Details">
          <h1>CHECKOUT</h1>
			<form action="" method="post" name="form1" >
         
             <div class="formGrp">
            <label class="labelGrp">Cloths ID</label>
              <input class="achr" type="text" name="Cloths_ID" value="<?php echo $id; ?>"/ required disabled>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Cloths Name</label>
              <input class="achr" type="text" name="Cloths_Name" value="<?php echo $Name; ?>"/ required disabled>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Discription</label>
              <input class="achr" type="text" name="Discription" value="<?php echo $Discription; ?>"/ required disabled> 
            </div>
            <div class="formGrp">
            <label class="labelGrp">Price</label>
              <input class="achr" type="text" name="Price"  value="<?php echo $price; ?>" placeholder="Enter Name" disabled>
            </div>

            <div class="formGrp">
            <label class="labelGrp">Size</label>
              <input class="achr" type="text" name="Size"   value="<?php echo $Size; ?>" placeholder="Enter Name" disabled>
            </div>

            <div class="formGrp">
                <label class="labelGrp">Metirial</label>
              <input class="achr" type="text" name="Metirial" value="<?php echo $Metirial; ?>" placeholder="Enter City" disabled>
            </div>

            <div class="formGrp">
            <label class="labelGrp">Available Qty</label>
              <input class="achr" type="text" name="clothes_Ava_qty"   value="<?php echo $qty; ?>" placeholder="Enter qty" disabled>
            </div>

            <div class="formGrp">
            <label class="labelGrp">Buying Qty</label>
              <input class="achr" type="text" name="clothes_Buy_qty"  placeholder="Enter qty" required>
            </div>

            <div class="formGrp">
              <label class="labelGrp">Payment</label>
            <select name="Size" class="achr" value="<?php echo $Size; ?>">
             <option value="Cash">Cash on dilivary</option>
             <option value="Cradit Card">Cradit Card</option>
             </select>
            </div>
            
            
           
            <div class="formGrp">
            <div class="formGrp">
              <button class="achr regClass btn" type="Submit" value="Submit" name="Submit" >Buy</button>
      
            
            </div>
            </div>
          </form>

          <?php   
          if(isset( $_POST['Submit']))
          {
            $b = (int)$_POST['clothes_Buy_qty']; 
            $qty;  
          if($b>$qty)
          {
            $msg = "Buying +$b.....+$qty+  amount is grater than available amount";
            echo "<script type='text/javascript'>alert('$msg');</script>";

          }
          else
          {
            $aa =0;
            $clothes_Ava_qty =0;

            $clothes_Buy_qty= (int)$_POST['clothes_Buy_qty'];

            $clothes_Ava_qty= (int)$_POST['clothes_Ava_qty'];

            $newqty =   $clothes_Buy_qty - $clothes_Ava_qty;

            $aa = $qty -  $newqty;

            $query = "UPDATE fclothes SET qty = '$aa' WHERE id = '$id' ";

            $update_ = mysqli_query($conn, $query);
            $aa =0;
            $clothes_Buy_qty = 0;
            $clothes_Ava_qty =0;

            $msg = "Buying process successful";
            echo "<script type='text/javascript'>alert('$msg');</script>";

            header("refresh:0; url=Female_cloths.php");
            

            if (!$update_) 
            {
                die("QUERY FAILED" . mysqli_error($conn));
            }
             
          } 
          }
        

          ?>


     

      
    

        
        </div>
    </div>

    <?php include("footer.php");?>

  </body>
</html>