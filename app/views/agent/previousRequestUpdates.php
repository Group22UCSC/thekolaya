<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/searchbar.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/preteaupdates.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<div class="topic">View Previous Tea Updates</div>
<div class="form-container">
<form class="searchform">
    <input type="date" id="date" name="date"  required>
    <input type="text" id="search" placeholder="Enter Landowner ID.." required>
    <input type="submit" value="search" id="submit">
</form>
<form class="resultform">
  <div class="inputfield">
    <label class="resultlbl">Landowner ID</label>
    <input type="text" id="lid"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Request Date</label>
    <input type="date" id="rdate" name="date"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Confirm Date</label>
    <input type="date" id="cdate" name="date"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Request Type</label>
    <input type="text" id="rtype"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Amount</label>
    <input type="text" id="ramount"  size="6"  readonly>
</div>
    
    
</form>
</div>
  <?php include 'bottomContainer.php';?>