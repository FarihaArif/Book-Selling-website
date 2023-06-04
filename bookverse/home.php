<?php

include 'config.php';






?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

   

</head>
<body>
   
<?php
 include 'header.php'; 
if(isset($_POST['add_to_cart'])){

  
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
   $p=mysqli_query($conn,"SELECT * FROM `products` WHERE name ='$product_name'");
   $q= mysqli_fetch_assoc($p);
   $quan=$q['quantity'];
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $wmessage[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image, product_quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$quan')") or die('query failed');
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

<section class="home">

   <div class="content">
      <h3 style="border-bottom: 1px solid #fff;">Hand Picked Book to your door.</h3>
      <p style="font-style:italic; color:#f8b69c; padding:10px;">"In the pages of this book, worlds unfold, characters breathe, and stories ignite the imagination. Welcome to a journey that will linger in your heart long after you turn the final page."</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title" style="text-transform:capitalize;color:black;background-color:#f7e1d3; width:100%">Our Featured Books</h1>
   <!-- Swiper -->
<div class="swiper swiper-books">
    <div class="swiper-wrapper">
    <?php  
            $select_products = mysqli_query($conn, "SELECT * FROM `products` where featured=1 LIMIT 6") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
      <div class="swiper-slide">
         <div class="profile">
            <div class="box-container">
         
  
         <form action="" method="post" class="box">
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
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
            
         </div>
      </div>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

   <div class="image">
         <!-- <img src="images/about-img.jpg" alt=""> -->
         <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img height="350" width="1140" src="https://prod-upp-image-read.ft.com/98b79a4e-fefb-11e8-aebf-99e208d3e521" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img height="350" width="1140" src="https://today.duke.edu/sites/default/files/legacy-files/styles/story_hero/public/duke_today_hero.jpg?itok=w5KiBcj9" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img height="350" width="1140" src="https://brightwatergroup.com/media/2280/reasons-to-keep-reading-books-relate-to-others.jpg?width=930&height=465" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img height="350" width="1140" src="https://www.oberlo.com/media/1612639204-image3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img height="350" width="1140" src="https://www.theladders.com/wp-content/uploads/books-reading-shelf.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img height="350" width="1140" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaZbww83x6doYqsdwBx6tMQP_LcFEQegXqul2yYgoYc40LpU6jbTiciD0h4hVnCxsQ4mA&usqp=CAU" class="d-block w-100" alt="...">
               </div>
            </div>
         </div>
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>know more about us. click the button below..</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Please be free to contact us.</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>

  var swiper = new Swiper(".swiper-books", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
		<script>
    $(".testmonial_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed: 1000,
        items: 3,
        loop: true,
        nav: false, // Set nav to false to hide the arrow buttons
        margin: 25,
        dots: true,
        responsive: {
            320: {
                items: 1
            },
            767: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
</script>

</body>
</html>