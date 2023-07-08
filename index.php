<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>Paypal</title>
      <style>
        input[type="text"], input[type="password"], textarea {
  border: none;
  outline: none;
  border-bottom: 0px solid #ccc; /* You can adjust the color and thickness of the outline */
}
      </style>
      <link rel="stylesheet" href="styles.css">
   </head>
   <body style="background-color: #6933d3; color:white !important;">
<h2 style="text-align:center !important; margin-top:8px;">Product Page</h2>
      <div class="container" style="margin-left:40% !important; margin-top:15px;">
   
      <?php
         require('db.php');
         $query = "SELECT * FROM `product_info`;";
         $result = $conn->query($query);
             if ($result->num_rows > 0) 
             {
             
                 while($row = $result->fetch_assoc()){
                    ?>
      <form method="post" action="checkout.php" >
         <!-- Important For PayPal Checkout -->
         <div class="card" style="width: 18rem; color:black">
            <img class="card-img-top" >  <img src="<?php echo $row["image"]; ?>">
            <div class="card-body"  style="text-align:center !important;">
               <h5 class="card-title" id="name" name="name"></h5>
               <h5><?php print_r($row["name"]) ;?></h5>
              <h5> <input type="text" style="text-align:center !important;"  class="card-body"  id="price" name="price" value="<?php print_r($row["price"]) ;?>$" class="no-outline"  readonly ></h5>
               <input type="submit"  id="submit" name="sub "value="Add Cart" class="btn-succes">
            </div>
         </div>
      </form>
   <?php }};   
    ?>
    
     
      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>