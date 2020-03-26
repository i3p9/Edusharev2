<?php
require "header2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Browse Courses</title>
</head>
<body>

<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Search Courses or Teachers">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th class="col-md-5 col-xs-5">Course Name</th>
      <th class="col-md-4 col-xs-4">Description</th>
      <th class="col-md-3 col-xs-3">Teacher</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    $sql = "SELECT name, description, teacher, coursetype, appointment FROM course";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            echo "<tr>";
            echo "<td>" . '<a href="classroomv2.php?course='.$name.'">'.$name.'</a>' . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['teacher'] . "</td>";
            echo "<td>" . $row['appointment'] . "</td>";
            echo "<tr>"; 
        }
        echo "</table>";
    } else { echo "0 results"; }
    $link->close();
?>
  </tbody>
  </table>
  </tbody>
</table>
</body>
</html>
<style type="text/css">
  body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
</style>
<script type="text/javascript">
  $(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});
</script>