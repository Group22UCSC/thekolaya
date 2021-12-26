<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">     
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/availabilityOn.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/toggle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Boxicons CDN Link -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>   
  <!-- <div class="modal"> -->
    <div class="toggle-div" id="toggle-div">
    <button class="backbtn" onclick="backToLogout()">Logout </button>
        <div class="note">Currently you are unavailable.Please switch on your availability</div>
          <label class="switch">
          <input type="checkbox" id="togglebtn">
          <span class="slider round"></span>
          </label>          
    </div>
  <!-- </div> -->

<script>
  var switchStatus = false;
  $("#togglebtn").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        // console.log("this is if part");
        // console.log(switchStatus);// To verify
        location.replace("agent/makeAvailable");
    }
    else {
       switchStatus = $(this).is(':checked');
       console.log("this is else part");
       console.log(switchStatus);// To verify
      
    }
});

function backToLogout(){
  location.replace("login");
}
  </script>
 