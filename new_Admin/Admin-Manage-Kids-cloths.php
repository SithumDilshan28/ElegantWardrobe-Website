<?php include("../connection.php");?>

<html>
<head>
<meta charset="utf-8">

<title>Admin</title>
<link rel="stylesheet" href="table.css" />
<title>Elegant wardrobe/Admin</title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>

<body>
<?php include("Admin-navigation-bar.php");?>


    
<center>
    <table class="table">
        <tr>

          <th>Clothes Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Size</th>
          <th>Material</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        <?php
        {
          $query = "select * from kclothes";
          $select_cloths = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($select_cloths)) {
            $id = $row['id'];
            $Name = $row['name'];
            $Discription = $row['discription'];
            $price = $row['price'];
            $Size = $row['size'];
            $Metirial = $row['metirial'];
            $Image = $row['file'];


            echo "<tr>";
            echo "<td>$Name</td>";
            echo "<td>$Discription</td>";
            echo "<td>$price</td>";
            echo "<td>$Size</td>";
            echo "<td>$Metirial</td>";
            echo "<td>$Image</td>";
            echo "<td><a href='Admin-Kids-Update.php?edit={$id}'>Update</a><br>
                      <a href='Admin-Manage-Kids-cloths.php?delete={$id}'>Delete</a></td>";
            echo "</tr>";
          }
        }
        ?>
        <?php 
        
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "delete from kclothes where id = {$id}";
            $delete_query = mysqli_query($conn, $query);
            
        }
        ?>
      </table>
      </center>
     
      </body>


