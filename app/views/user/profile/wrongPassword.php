<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/otp/verify-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="container">
        
        <p style="text-align: center;"><i style="color: red;" class="far fa-times-circle"></i><br>
            <h2 style="text-align: center; color: #089633;">Oops Your Password is wrong</h2><br>
            <h3 style="text-align: center; color: #089633;">Try Again!</h3>
        </p>
        <a style="text-decoration:none;" href="<?php echo URL.$_SESSION['user_type']?>/enterPassword"><input type="button" value="Back" name="verify" class="btn"/></a>
    </div>
    <script src="<?php echo URL?>vendors/js/otp/otp-js.js"></script>
</body>
</html>