

<header class="header">



   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><img src="images\logo-removebg-preview.png" alt="BookVerse."></a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>

            <?php
            session_start();
             if(isset($_SESSION['login'])){
               
               $user_id = $_SESSION['user_id'];
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
               echo <<<data
                        <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(  $cart_rows_number )</span> </a>
                        </div>
                        
                        <div class="user-box">
                           <p class="p1">username : <span>  $_SESSION[user_name]</span></p>
                           <p class="p1">email : <span>  $_SESSION[user_email]</span></p>
                           <a href="logout.php" class="delete-btn">logout</a>
                        </div>
                        </div>
                     data;
             }
             else{
               echo <<< data
                  <div class="user-box">
                  <p class="p"> <a href="login.php">add an account</a> </p>
                  <p class="p2"> don't have an account? <a href="register.php">create now!</a> </p>
                  </div>

               data;
             }
                     ?>
         </div>

</header>