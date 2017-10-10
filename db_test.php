<?php

//require database library
require_once 'db.php';


//write SQL query
$query = "
    SELECT *
    FROM `imdb_movie`
    WHERE `imdb_movie`.`imdb_id`=?
    ";



//run the query
$statement = db::query($query, ['317219']);

//fetch the results
$data = $statement->fetchAll();

//var_dump($data);




echo $data[0]['length'];


//output the results
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>movies:</h1>
   



  




   <?php
   $query5 ="
SELECT `imdb_movie`.`imdb_movie_status_id`, `imdb_movie_status`.`label`
FROM `imdb_movie`
LEFT JOIN `imdb_movie_status`
    ON `imdb_movie`.`imdb_movie_status_id` = `imdb_movie_status`.`id`
      WHERE `imdb_id` = ?
";
$statement5 = db::query($query5, [$_GET['id']]);
$data5 = $statement5->fetchAll();

//var_dump($data5);
echo ($data5[0]['label']);
?>






 <!-- <ul>

    <?php foreach($data as $imdb_movie) : ?>
    <li> <?php echo 'name: '.$imdb_movie['name']; ?> </li>
    <li> <?php echo 'rating: '.$imdb_movie['rating']; ?> </li>
    <li> <?php echo 'Votes: '.$imdb_movie['votes_nr']; ?> </li>
    <li> <?php echo 'length: '.$imdb_movie['length']; ?> </li>

    <?php echo '<br>'; ?>
    <?php endforeach; ?>
   


    </ul>
 -->




</body>
</html>