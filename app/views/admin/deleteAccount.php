<?php include 'top-container.php'; ?>

<link rel="stylesheet" href="<?php echo URL ?>vendors/css/admin/deleteAccount.css">




<div class="middle">DELETE ACCOUNTS</div>

<div class="middle-conatiner">

  <div class="name1">




    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    <table id="myTable">
      <tr class="header">
        <th style="width:33.33%;">Name</th>
        <th style="width:33.33%;">ID</th>
        <th style="width:33.33%;">Contact Number</th>

      </tr>
      <div class="vertical">

        <?php
        $x = count($data);
        for ($i = 0; $i < $x; $i++) {
          echo '<tr id="tea" data-href="">     
                                           <td>' . $data[$i]['name'] . '</td>
                                           <td>' . $data[$i]['user_id'] . '</td>
                                           <td>' . $data[$i]['contact_number'] . '</td>
                                           
                                       </tr>';
        }
        ?>



      </div>

    </table>

    <!-- table data get auto filled form -->
    <script>
      var table = document.getElementById('myTable'),
        rIndex;
      for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
          //rIndex=this.rowIndex;
          if (this.cells[1].innerHTML.substring(0, 3) != "ADM") {
            document.getElementById("fname").value = this.cells[0].innerHTML;
            document.getElementById("id").value = this.cells[1].innerHTML;
            document.getElementById("Phone").value = this.cells[2].innerHTML;
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: "Can't delete Admin !",
            })
          }
        };
      }
    </script>






    <!--  // script for filtering -->
    <script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>


  </div>
</div>




<div class="middle1">
  <a>DELETE ACCOUNTS</a>
</div>


<div class="k1">
  <div class="wrapper1">
    <div class="title"> Delete Form </div>
    <form action="<?php echo URL ?>admin/deleteAccount" method="POST" id="deleteForm">
      <div class="form">
        <div class="inputfield">
          <label> Name</label>
          <input type="text" name="name" id="fname" class="input" required readonly>
        </div>

        <div class="inputfield">
          <label>ID</label>
          <input type="text" name="user_id" id="id" class="input" required readonly>
        </div>

        <div class="inputfield">
          <label>Phone number</label>
          <input type="text" name="contact_number" id="Phone" class="input" required readonly>
        </div>


        <!-- <div class="inputfield">
                  <a>If you want to delete the account</a>
               </div> 
 -->

        <div class="last">
          <div class="b">
            <input type="submit" value="Delete" class="btn" id="deleteAccountBtn">
          </div>


          <!--     <div class="a">
                    <a href="<?php echo URL ?>admin/admin"><input type="submit" value="Discard" class="btn"></a>
                  </div>

              </div>
 -->
    </form>
  </div>
</div>
</div>


<?php include 'js/admin/deletejs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
<script>
  $(document).ready(function() {

  })
</script>
<?php include 'bottom-container.php'; ?>