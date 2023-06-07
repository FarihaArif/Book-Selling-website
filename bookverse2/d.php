<?php

include 'config.php';


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
   
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style1.css">
</head>
<body>
<?php include 'header.php'; 
if(isset($_POST['add_to_cart'])){

   $p_id=$_GET['id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
   $p=mysqli_query($conn,"SELECT * FROM `products` WHERE id ='$p_id'");
   $q= mysqli_fetch_assoc($p);
   $quan=$q['quantity'];
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $wmessage[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, price, quantity, image, product_quantity, p_id) VALUES('$user_id', '$product_price', '$product_quantity', '$product_image','$quan','$p_id')") or die('query failed');
      $up_cat=mysqli_query($conn,"UPDATE `products` set quantity=(quantity - $product_quantity) WHERE name = '$product_name'");
      $message[] = 'product added to cart!';
   }

}
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="emessage">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
if(isset($wmessage)){
   foreach($wmessage as $wmessage){
      echo '
      <div class="wmessage">
         <span>'.$wmessage.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<div class="aheading">
   <h3>Description</h3>
</div>

<section class="about1">

    <div class="flex">
       
       <?php  
       $d=$_GET['id'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` where id='$d' ") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
      <div class="box-container">
          <form action="" method="post" class="box">
          <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="name"><?php echo $fetch_products['author']; ?></div>
          <div class="price">PKR.<?php echo $fetch_products['price']; ?>/-</div>
          <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
          <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
          <?php
                if(isset($_SESSION['login'])){
                 if($fetch_products['quantity']==0){
                    echo '<p class="empty">out of stock</p>';
        
                  }
                  else{?>
                     <input type="number" min="1" max="<?php echo $fetch_products['quantity']?>" name="product_quantity" value="1" class="qty">
                     
                     <input type="submit" value="add to cart" name="add_to_cart" class="btn-1">
                 <?php }
                }
               ?>
          </form>
         
  

         </div>

   

      <div class="content">
         <h3>Description</h3>
         <p> <?php echo $fetch_products['description']; }}?></p>  
      </div>

   </div>

</section>



    


<?php include 'footer.php'; ?>



</body>
</html>