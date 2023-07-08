<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PayPal Smart Button Integration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://www.paypal.com/sdk/js?client-id=AbvnG_c6Gxd14cK8CQdoXpgMK3ODaGRv5bLrT0yuCVmSIZEh-lS71fSNoZScMyYfAkPwlyQmIItzJ-A6"></script>
</head>
<?php


$price = $_POST['price'];

?>
<body style="background-color: #6933d3;color:white !important;">
<h2 style="text-align:center !important; margin-top:5px;">Checkout Page</h2>
<div class="container"  style="margin-left: 9% !important; padding: 5%; border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important;">

      <div class="col-md-8" style="margin-left: 10% !important;">
            <form method="post" action="">
               <div class="md-4">
                  <div class="col">
                     <div class="form-outline">
                  
                     <span>Customer Name</span><input type="text" id="form6Example2" name="name" class="form-control"
                           placeholder="Please enter name" required />
                     </div>
                  </div>
               </div>
               <class="mb-4">
                  <div class="col">
                     <div class="form-outline">
                        <label class="form-label" for="form6Example1">Customer Email</label>
                        <input type="email" id="form6Example1" name="email" class="form-control"
                           placeholder="Please enter Email" required />
                     </div>
                  </div>

                  <div class="mb-4">
                     <div class="col">
                        <div class="form-outline">
                           <label class="form-label" for="form6Example2">Pin code</label></label>
                           <input type="text" id="form6Example2" name="PIN CODE" class="form-control"
                              placeholder="Please enter Pin code" required />
                        </div>
                     </div>
                     
                  <div class="md-4">
                  <div class="col">
                     <div class="form-outline">
                     <span>Phone</span><input type="text" id="form6Example2" name="phone"  id="phone" class="form-control"
                           placeholder="Please enter phone" required />
                     </div>
                  </div>
               </div>

               <div class="md-4">
               <class="mb-4">
                  <div class="col">
                     <div class="form-outline">
                        <label class="form-label" for="form6Example1">Address</label>
                        <input type="email" id="form6Example1" name="address" class="form-control"
                           placeholder="Please enter Address" required />
                     </div>
                  </div>

                  <div class="mb-4">
                     <div class="col">
                        <div class="form-outline">
                           <label class="form-label" for="form6Example2">Amount</label></label>
                           <input type="text" id="form6Example2" name="amount"  value="<?php echo $price; ?>"class="form-control"
                              placeholder="Please enter Customer Name" required readonly />
                        </div>
                     </div>
                     </div>

               <div id="paypal-button-container"></div>
            </form>
       
</div>

        <script>
        paypal.Buttons({
      
            createOrder: function(data, actions) {
                return fetch('create_order.php', {
                    method: 'POST',
                    data:data,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function(response) {
                    return response.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },
            onApprove: function(data, actions) {
                return fetch('capture_payment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                }).then(function(response) {
                    return response.json();
                }).then(function() {
                    alert('Payment completed successfully.');
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
