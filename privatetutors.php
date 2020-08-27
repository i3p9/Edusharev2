<?php
require "header2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Private tutors</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<h2>Private Tutors</h2>
<input style="width: 50%;" type="text" name="search" id="search" placeholder="Search Courses or Teachers" onkeyup="myFunction()">             
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="cse">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Subject 4</th>
                </tr>
            </thead>
        <tbody>
<?php
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    $sql = "SELECT teacher, sub1, sub2, sub3, sub4 FROM privates";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            echo "<tr>";
            echo "<td>" . '<a href="classroomv2.php?course='.$name.'">'.$name.'</a>' . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['teacher'] . "</td>";
            echo "<td>" . $row['appointment'] . "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
    } else { echo "0 results"; }
    $link->close();
?>
            </tbody>
        </table>
    </div>               
</div>
</body>
<footer>
    <?php require "footer.php"; ?>
</footer>

<style>
    body{
        background: white;
    }
    h2{
        margin: 50px;
    }
    table{
        margin: 50px;
    }
    td,th{
        padding:3%; 
    }
    a{
        text-decoration: none;
    }
    #search{
        margin-left: 50px;
        border-color: orange;
    }
</style>
<script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      td = tr[i].getElementsByTagName("td")[1];
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      }else if(td){
        txtValue = td.textContent || td.innerText;
        td = tr[i].getElementsByTagName("td")[2];
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
        } else if(td) {
            txtValue = td.textContent || td.innerText;
            td = tr[i].getElementsByTagName("td")[3];
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else if(td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        }
      }
    }
  }

</script>
</html>
