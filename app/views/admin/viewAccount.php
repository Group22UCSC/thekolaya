

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/viewAccount.css">



    
   <div class="middle">VIEW ACCOUNTS</div>

   <div class="middle-conatiner">

     <div class="name1">
     

   
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:20%;">ID</th>
    <th style="width:40%;">Type</th>
   
  </tr>

<?php
        $x=count($data);
        for($i=0;$i<$x;$i++){
          echo '<tr id="tea" data-href-tea="Admin/viewAccount1">
                    <td>'.$data[$i]['name'].'</td>
                    <td>'.$data[$i]['user_id'].'</td>
                    <td>'.$data[$i]['user_type'].'</td>
                    
                </tr>';                
        }       
      ?>         


  
</table>

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

<script>

//roneki gen gatta ewa//
  document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href-tea]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
         openteaform();

</script>


      
     </div>

    
  </div>
<?php include 'bottom-container.php';?>