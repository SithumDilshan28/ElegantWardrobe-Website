
 <html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Elegant wardrobe/Admin</title>
    <link rel="stylesheet" type="text/css" href="Admin.css">
  </head>
  <body>
  <?php include("Admin-navigation-bar.php");?>

    <div class="form">
      <br>
        <div class="Details">
          <h1>Insert New Item</h1>
          <form class="regForm" action="#" method="post"  enctype="multipart/form-data">
            <div class="formGrp">
              <label class="labelGrp">Cloth Name</label>
              <input class="achr" type="text" name="Cloths_Name" value="" placeholder="Enter Cloth Name" req>
            </div>
            <div class="formGrp">
              <label class="labelGrp">Description</label>
              <input class="achr" type="text" name="Discription" value="" placeholder="Description">
            </div>
            <div class="formGrp">
              <label class="labelGrp">Price</label>
              <input class="achr" type="text" name="Price" value="" placeholder="Price">
            </div>
            <div class="formGrp">
              <label class="labelGrp">Size</label>
            <select name="Size" class="achr">
             <option>Size Type</option>
             <option value="Small">Small</option>
             <option value="Medium">Medium</option>
             <option value="Large">Large</option>
             </select>
              </div>
            <div class="formGrp">
              <label class="labelGrp">Material</label>
              <input class="achr" type="text" name="Metirial" value="" placeholder="Material">
            </div>
            <div class="formGrp">
              <label class="labelGrp">Quantity</label>
              <input class="achr" type="text" name="Qty" value="" placeholder="Quantity">
            </div>
            <div class="formGrp">
              <label class="labelGrp">File</label>
              <input class="achr" type="file" name="img" >
            </div>
          
            <div class="formGrp">
              <button class="achr regClass btn" type="submit" name="submit">Insert</button>
            </div>
          </form>
        </div>
    </div>
  </body>
</html>

<br>

<?php 
if (isset($_POST['submit'])) {  
   include("../connection.php");
   
   $ClothesName = $_POST['Cloths_Name']; 
   $Discription = $_POST['Discription'];  
   $Price = $_POST['Price'];
   $Size = $_POST['Size'];
   $Metirial = $_POST['Metirial'];
   $img = $_FILES['img']['name'];
   $Qty = $_POST['Qty'];
   $img_temp = $_FILES['img']['tmp_name'];
  
   move_uploaded_file($img_temp, "../img/$img");
  
    
        if ($ClothesName==""||$Discription==""||$Price==""||$Size==""||$Metirial==""||$img=="")
        {
            $msg = "Clothes Details fields cant be empty.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh:1; url=Admin-kids-Add.php");
        }
    else
    {
    
	$sql = "INSERT INTO kclothes ". "(name,discription,price,size,metirial,file,qty) ". "VALUES('$ClothesName','$Discription','$Price','$Size','$Metirial','$img','$Qty')";
	
    
	$results = mysqli_query($conn, $sql);
            
            if(!$results) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
            else
			{
            echo "Successfully Entered\n";
            header("refresh:1; url=Admin-kids-Add.php");
			}
   }}  
?>