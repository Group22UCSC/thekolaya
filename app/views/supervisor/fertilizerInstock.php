<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php'?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/instock-style.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Fertilizer buy details</h2>
  </div>
  <div class="middle-container">
    <div class="form-container">
      <form action="<?php echo URL ?>Supervisor/firewoodInStock" method="GET">
        <div class="form">
          <div class="inputfield">
            <label class="search-lable">Search fertilizer buy</label>
            <input type="date" class="search-label input" name="date">
            <input type="submit" value="Search" class="accept-btn" name="search_btn">
          </div>
        </div>
      </form>
    </div>

    <!-- <div class="tabel-container">
          <?php

          // if(count($data) > 0) {
          //   echo '<div class="table-row table-head">
          //           <div class="table-element"><b>Date</b></div>
          //           <div class="table-element"><b>Price Per Unit(Rs)</b></div>
          //           <div class="table-element"><b>Amount(kg)</b></div>
          //           <div class="table-element"><b>Price For Amount(Rs)</b></div>
          //           <div class="table-element"><b>Emp_id</b></div>
          //         </div>';
          //   for($i = 0; $i < 1; $i++) {
          //     echo '<div class="table-row">
          //           <div class="table-element date">'.$data[$i]['in_date'].'</div>
          //           <div class="table-element">'.$data[$i]['price_per_unit'].'</div>
          //           <div class="table-element">'.$data[$i]['in_quantity'].'</div>
          //           <div class="table-element">'.$data[$i]['price_for_amount'].'</div>
          //           <div class="table-element">'.$data[$i]['emp_id'].'</div>
          //         </div>';
          //   }
          // }else {
          //   echo 'Data is not inserted';
          // }
          ?>
        </div> -->

    <div class="tabel-container">
      <div class="table-wrapper">
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Date</div>
            <div class="cell">Price Per Unit(Rs)</div>
            <div class="cell">Amount(kg)</div>
            <div class="cell">Price For Amount(Rs)</div>
          </div>
          <?php
          if (count($data) > 0) {
            for ($i = 0; $i < count($data); $i++) {
              echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">' . $data[$i]['in_date'] . '</div>
                    <div class="cell" data-title="Tea_weight">' . $data[$i]['price_per_unit'] . '</div>
                    <div class="cell" data-title="Agent_id">' . $data[$i]['in_quantity'] . '</div>
                    <div class="cell" data-title="Agent_id">' . $data[$i]['price_for_amount'] . '</div>
                  </div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php include 'bottom-container.php'; ?>