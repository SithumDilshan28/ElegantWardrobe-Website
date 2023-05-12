<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <title>Elegant wardrobe/Admin</title>
  </head>
  <body>
  <?php include("../connection.php");?>
  <?php 
        if(isset($_GET['edit'])){
        $id = $_GET['edit'];
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
            $img = $row['file'];
           }

        if(isset($_POST['submit'])){
          $ClothesName = $_POST['Cloths_Name']; 
          $Discription = $_POST['Discription'];  
          $Price = $_POST['Price'];
          $Size = $_POST['Size'];
          $Metirial = $_POST['Metirial'];
          $img = $_FILES['img']['name'];
          $img_temp = $_FILES['img']['tmp_name'];
         
          move_uploaded_file($img_temp, "../img/$img");
            
          $query = "UPDATE fclothes set ";
          $query .="name = '{$ClothesName}', ";
          $query .="discription = '{$Discription}', ";
          $query .="price = '{$Price}', ";
          $query .="size = '{$Size}', ";
          $query .="metirial  = '{$Metirial}', ";
          $query .="file= '{$img}' ";
          $query .="where id = {$id} ";

        $update_stock = mysqli_query($conn,$query);

        if(!$update_stock){
            die("QUERY FAILED" . mysqli_error($conn));
        }
        else{
          header("refresh:1; url=Admin-Manage-Female-cloths.php");
          echo "Successfully Updated\n";  
        }
        }
?>

    <div class="form">
      <br>
        <div class="Details">
          <h1>Update Cloth</h1>
			<form action="" method="post" name="form1" enctype="multipart/form-data">
         
            <div class="formGrp">
            <label class="labelGrp">Cloths Name</label>
              <input class="achr" type="text" name="Cloths_Name" value="<?php echo $Name; ?>"/ required>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Discription</label>
              <input class="achr" type="text" name="Discription" value="<?php echo $Discription; ?> "/ required>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Price</label>
              <input class="achr" type="text" name="Price"  value="<?php echo $price; ?>" placeholder="Enter Name">
            </div>

            <div class="formGrp">
              <label class="labelGrp">Size</label>
            <select name="Size" class="achr" value="<?php echo $Size; ?>">
             <option>Size Type</option>
             <option value="Small">Small</option>
             <option value="Medium">Medium</option>
             <option value="Large">Large</option>
             </select>
            </div>

            <div class="formGrp">
                <label class="labelGrp">Metirial</label>
              <input class="achr" type="text" name="Metirial" value="<?php echo $Metirial; ?>" placeholder="Enter City">
            </div>
            
            <div class="formGrp">
              <label class="labelGrp">File</label>
              <input class="achr" type="file" name="img" >
            </div>
           
            <div class="formGrp">
            <div class="formGrp">
              <button class="achr regClass btn" type="submit" name="submit">Update</button>
            </div>
            </div>
          </form>
          
      
    

        
        </div>
    </div>
  </body>
</html>