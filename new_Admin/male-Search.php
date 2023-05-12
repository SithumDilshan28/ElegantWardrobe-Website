<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="Add_Courses.css">
    <title>Elegant wardrobe/Admin</title>
  </head>
  <body>
  <?php include("Admin-navigation-bar.php");?>
  <link rel="stylesheet" type="text/css" href="Admin.css">

    <div class="form">
      <br>
        <div class="Details">
          <h1>Search Male Item</h1>
			<form action="" method="post" name="form1" >
         <br>
			<input class="achr" type="text" name="Cloths_Name" value="" placeholder="Enter Cloth Name"  required >
				<input type="submit" class="achr regClass btn" id="search" name="search" placeholder="Search Cource Name" ><br/>
				
     <?php
      if(isset($_POST['search']))
      { 
         include("../connection.php");
	 
				
		$b=$_POST['Cloths_Name'];
	
            $sql = 'SELECT * FROM mclothes WHERE name = "'.$b.'"';

            $update = mysqli_query($conn,$sql);
					
  		  while($row = mysqli_fetch_assoc($update)) {
            $id = $row['id'];
            $Name = $row['name'];
            $Discription = $row['discription'];
            $price = $row['price'];
            $Size = $row['size'];
            $Metirial = $row['metirial'];
            $img = $row['file'];

            
           }
		  ?>



            <div class="formGrp">
            <label class="labelGrp">Cloth Name</label>
              <input class="achr" type="text" name="Cloths_Name" value="<?php echo $Name; ?>"/ required>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Description</label>
              <input class="achr" type="text" name="Discription" value="<?php echo $Discription; ?> "/ required>
            </div>
            <div class="formGrp">
            <label class="labelGrp">Price</label>
              <input class="achr" type="text" name="Price"  value="<?php echo $price; ?>" placeholder="Enter Name">
            </div>

            <div class="formGrp">
                <label class="labelGrp">Material</label>
              <input class="achr" type="text" name="Metirial" value="<?php echo $Metirial; ?>" placeholder="Enter City">
            </div>
          </form>


        
        <br>
        <br>

      
        <?php
	


	 }
	  	 
?>
    
        
        </div>
    </div>
  </body>
</html>