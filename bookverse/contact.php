<?php

include 'config.php';






?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'header.php';
   if(!isset($_SESSION['login'])){
      $wmessage[]='login first';
   }
if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $wmessage[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
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


   <div class="form-container">
   <form action="" method="post">
      <h3>Contact Us</h3>
      <div>
         <input type="text" name="name" placeholder="Enter Your Name" required class="box">
      </div>
      <div>
        <input type="email" name="email" placeholder="Enter your email" required class="box">
      </div>
      <div>
        <input type="text" name="number" placeholder="Enter your number" required class="box">
      </div>
      <div>
      <textarea name="message" class="box" placeholder="Enter your message" id="ta" cols="30" rows="4"></textarea>
      </div>
      <div>
         <?php
         if(!isset($_SESSION['login'])){
            
         ?>
      
      <?php } 
      else{?>
         <input type="submit" value="send message" name="send" class="btn">
<?php }?>

      </div>
   </form>
   </div>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>