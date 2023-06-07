<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   if(isset($_POST['featured'])){
      $f=1;
   }
   else{
      $f=0;

   }
   $a=$_POST['author'];
   $m=$_POST['message'];
   $q=$_POST['quantity'];
   $c=$_POST['cat'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
    
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, category_id, featured, quantity, author, description) VALUES('$name', '$price', '$image', '$c','$f','$q','$a','$m')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   if(isset($_POST['up_featured'])){
      $f=1;
   }
   else{
      $f=0;

   }
   $u_a=$_POST['update_a'];
   $u_m=$_POST['update_m'];
   $update_quantity=$_POST['update_quantity'];
   $update_cat_id=$_POST['cat'];
   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', category_id='$update_cat_id',featured='$f',quantity='$update_quantity',author='$u_a' ,description='$u_m' WHERE id = '$update_p_id'") or die('query failed');
   

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];
   

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
         
      }
   }
   

   header('location:admin_products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style1.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<div class="product-bg">
<section class="add-products">

 <h1 class="title">shop products</h1>

 <form action="" method="post" enctype="multipart/form-data">
   <h3>add product</h3>
   <input type="text" name="name" class="box" placeholder="enter product name" required>
   <input type="text" name="author" class="box" placeholder="enter author name" required>
   <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
   <input type="number" min="0" name="quantity" class="box" placeholder="enter quantity " required>
   <div class="wh">
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="f" required>
      
      <div class="ch"> 
         <input type="checkbox" value="1" class="cbox" name="featured"><p class="feat">  Featured</p>
      </div>
   </div>
      <?php
   $query= mysqli_query($conn,"SELECT * FROM `category`");
   $row=mysqli_num_rows($query);
   ?>
   <select name="cat"style="color: #fff; font-weight:100 " id="category" class="box">
      <?php
      for($i=1;$i<=$row;$i++){
         $r=mysqli_fetch_array($query);
         
         ?>
      <option value="<?php echo $r['category_id']?>"style="background-color:  black"><?php echo $r['category_name']?></option>
      <?php
      }?>
   <textarea name="message" class="mbox" placeholder="Enter your description"  cols="30" rows="2"></textarea>

    <input type="submit" value="add product" name="add_product" class="update-btn">
 </form>

</section>


<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

<div class="box-container">

   <?php

      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_products = mysqli_fetch_assoc($select_products)){
   ?>
   <div class="box">
      <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <?php
      $cate=$fetch_products['category_id'];
      $b=mysqli_query($conn,"SELECT category_name FROM `category` where category_id =$cate");
      $fetch_category=mysqli_fetch_assoc($b);
      ?>
      <div class="deco">
      <div class="genre"><?php echo $fetch_category['category_name']; ?> | </div>
      <div class="price"> PKR.<?php echo $fetch_products['price']; ?>/-</div>
      </div>
      <div class="quantity">Quantity: <?php echo $fetch_products['quantity']; ?></div>
      <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="update-btn">update</a>
      <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
</div>

</section>

<section class="edit-product-form">

<?php
   if(isset($_GET['update'])){

      $update_id = $_GET['update'];
      $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
      if(mysqli_num_rows($update_query) > 0){
         while($fetch_update = mysqli_fetch_assoc($update_query)){
?>


   <form class="box-container" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="text" name="update_a" value="<?php echo $fetch_update['author']; ?>" class="box" required placeholder="enter author name">
      <?php
      $query= mysqli_query($conn,"SELECT * FROM `category`");
      $row=mysqli_num_rows($query);
      ?>
      <input type="number"  name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="number" name="update_quantity" value="<?php echo $fetch_update['quantity']; ?>" min="0" class="box" required placeholder="enter quantity">
      <div class="wh">
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="f">
         
         <div class="ch"> 
            <input type="checkbox" value="1" class="cbox" name="up_featured"><p class="feat">  Featured</p>
         </div>
      </div>
     
      <select name="cat" id="category" class="box">
      <p> select a category</p>
      <?php
      for($i=1;$i<=$row;$i++){
         $r=mysqli_fetch_array($query);
         
         ?>
      <option value="<?php echo $r['category_id'];?>"style="background-color:  black"><?php echo $r['category_name']?></option>
      <?php
      }?>
       <textarea name="update_m" class="mbox"  placeholder="Enter your description"  cols="30" rows="2"><?php echo $fetch_update['description'];?></textarea>
      
      <input type="submit" value="update" name="update_product" class="update-btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
</form>
   
<?php
      }
   }
   }else{
      echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
   }
?>

</section>

<section class="footer">
<p class="credit"> &copy; copyright  @ <?php echo date('Y'); ?> by <span>bookVerse.</span> </p>
</section>
</div>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>