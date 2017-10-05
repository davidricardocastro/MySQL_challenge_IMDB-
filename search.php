<?php


//require database library
require_once 'db.php';

$_GET;

//write SQL query
$query = "
    SELECT name, imdb_id
    FROM `imdb_movie`
    
    ";


  

//run the query
$statement = db::query($query);

//fetch the results
$data = $statement->fetchAll();
 
//var_dump($data);

//output the results

?>


<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h1>movies</h1>
  
  <!--  <ul>

    <?php foreach($data as $movie) : ?>
    <li> <?php echo $movie[0].$movie[1] ?> </li>

    <?php endforeach; ?>
    
    </ul>

-->



<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>    
  </tr>


  <?php foreach($data as $movie) : ?>

  <tr>
    <td><?php echo '<a href="imdb_movie.php?id='.$movie[1].'">'.$movie[0].'</a>' ?></td>
  </tr>

  <?php endforeach; ?>
  


</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>