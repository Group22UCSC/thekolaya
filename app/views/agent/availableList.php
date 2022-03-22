<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/availablelist.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/searchbar.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/table-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/table2-style.css">
  <!-- <script src="<?php echo URL ?>vendors/js/agent/dashboard.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Boxicons CDN Link -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'topContainer.php'; ?>
  <?php
  if ($data != 0) {
    $x = count($data);
  } else {
    $x = "0";
  }
  // $x = count($data);
  ?>
  <div class="topic">Tea Available Landowner List </div>

  

  <form class="searchform" id="searchform">
    <input type="text" id="search" placeholder="Search Here ...">
  </form>
  <div class="availablelist">
    <?php include 'unavailableNotice.php'; ?>
    <?php include 'agentUnavailableNotice.php'; ?>
    <div class="table-wrapper">
      <div class="table_header">Today Available landowners</div>
      <div class="table" id="today_collection_table">
        <div class="row tabel-header">
          <div class="cell">Landowner ID</div>
          <div class="cell">Name</div>
          <div class="cell">Container Estimation</div>
          <div class="cell">Address</div>
          <div class="cell">Route</div>
        </div>
        <?php

        if (!empty($data)) {
          for ($i = 0; $i < count($data); $i++) {
            echo '<div class="row table2-row">
                      <div class="cell" data-title="Landowener_id">' . $data[$i]['user_id'] . '</div>
                      <div class="cell" data-title="Name">' . $data[$i]['name'] . '</div>
                      <div class="cell" data-title="Container Estimation">' . $data[$i]['no_of_estimated_containers'] . '</div>
                      <div class="cell" data-title="Address">' . $data[$i]['address'] . '</div>
                      <div class="cell" data-title="Route">' . $data[$i]['route_no'] . '</div>
                    </div>';
          }
        }
        ?>
      </div>
    </div>

  </div>
  <div class="forms">
    <?php include 'teaCollection.php'; ?>
  </div>
  <script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      if (<?php echo $x ?> == '0') {
        console.log('zero landowners');
        $('#searchform').hide();
        $('#availabletable').hide();
        $('#unavailable_notice').show();
      }
      if (<?php echo $_SESSION['availability'] ?> == '0') {
        console.log('zero landowners');
        $('#searchform').hide();
        $('#availabletable').hide();
        $('#unavailable_notice').hide();
        $('#agent_unavailable_notice').show();
      }
      $('#myBtn').click(function(event) {
        event.preventDefault();
        var form = $('#teaUpdateForm').serializeArray();
        $('.error').remove();
        var landownerId = $('#lid').val();
        var initialTeaWeight = $('#weight').val();
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Landowner ID: <span style=\"color:#01830c;\"><b>" + landownerId + "</b></span></div>" +
          "<div>Intial Tea Weight :  <span style=\"color:#01830c;\"><b> " + initialTeaWeight + "kg</b></span></div>" +
          "</div>" +
          "</div>";

        if (initialTeaWeight == 0) {
          $('#weight').parent().after("<p class=\"error\">*Please insert the initial tea weight</p>")
        } else if (initialTeaWeight < 0) {
          $('#weight').parent().after("<p class=\"error\">*Can't Insert minus values</p>");
        }

        if (initialTeaWeight <= 0) {
          return;
        }
        Swal.fire({
          title: 'Are you sure?',
          html: '<div>' + str + '</div>',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#01830c',
          cancelButtonColor: '#ff3300',
          confirmButtonText: 'Yes, Update!'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#teaUpdateForm").trigger("reset");
            $.ajax({
              type: "POST",
              url: "<?php echo URL ?>agent/updateTeaWeight",
              cache: false,
              data: form,
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Updated !',
                  text: 'Your file has been updated.',
                  confirmButtonColor: '#01830c'
                }).then((result) => {
                  location.reload();
                })
              },
              error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                })
              }
            })
          }
        })
      })

      //search for a landowner
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#today_collection_table .table2-row").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    })
  </script>
  <script>
    var table = $("#today_collection_table");
    table.click(function(event) {
      if (!$(event.target.parentNode).hasClass("tabel-header")) {
        document.getElementById("lid").value = event.target.parentNode.firstElementChild.innerHTML;
        openteaform()
      }
    })

    function openteaform() {
      document.getElementById("teapopup").style.display = "block";
    }

    function closeteaform() {
      document.getElementById("teapopup").style.display = "none";
    }

    function openrequestform() {
      document.getElementById("requestpopup").style.display = "block";
    }

    function closerequestform() {
      document.getElementById("requestpopup").style.display = "none";
    }

    function openpopup() {
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 

      modal.style.display = "block";
      var x = document.getElementById("lid").value;
      document.getElementById("lid-pop").value = x;
      var y = document.getElementById("weight").value;
      document.getElementById("weight-pop").value = y;
    }

    function closepopup() {
      document.getElementById("myModal").style.display = "none";
    }

    function closeformpopup() {
      document.getElementById("myModal").style.display = "none";
      closeteaform();
    }
  </script>
  <?php include 'bottomContainer.php'; ?>