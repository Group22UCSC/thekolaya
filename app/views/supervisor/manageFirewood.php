<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <?php include 'styles-titleIcon-included.php'?>
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/stock-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Update Firewood Details</h2>
    </div>
    <div class="middle-container">
      <div class="form-instock">
        <div class="form-container">
          <div class="title">
            Firewood Purchase
          </div>
          <form action="<?php echo URL?>Supervisor/manageFirewood" method="POST" id="form_instock">
            <div class="form">
              <div class="inputfield">
                <label>Price per unit(Rs)</label>
                <input type="number" class="input" name="price_per_unit" id="price_per_unit">
              </div>  
              <div class="inputfield">
                <label>Amount(kg)</label>
                <input type="number" class="input" name="amount" id="in_amount">
              </div>  
              
              <div class="inputfield">
                <input type="submit" value="Submit" class="accept-btn" id="instock_submit_btn" name="firewood_in">
              </div>
              <a href="<?php echo URL?>Supervisor/firewoodInStock">
                <div class="inputfield">
                  <input type="button" value="Firewood Purchase Details" class="accept-btn">
                </div>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="form-outstock">
        <div class="form-container">
          <div class="title">
            Firewood use
          </div>
          <form action="<?php echo URL?>Supervisor/manageFirewood" method="POST" id="form_outstock">
            <div class="form">
                <div class="inputfield">
                  <label>Amount(kg)</label>
                  <input type="number" class="input" name="amount" id="out_amount">
                </div>  
                
              <div class="inputfield">
                <input type="submit" value="Submit" class="accept-btn" id="out-stock-submit" name="firewood_out">
              </div>
              <a href="<?php echo URL?>Supervisor/firewoodOutStock">
                <div class="inputfield">
                  <input type="button" value="Firewood Usage Details" class="accept-btn">
                </div>
              </a>
            </div>
          </form>
        </div>
      </div>
      
    </div>
<?php include 'script-included.php'?>
<?php include 'js/supervisor/manageFirewood-js.php';?>
<?php include 'bottom-container.php';?>