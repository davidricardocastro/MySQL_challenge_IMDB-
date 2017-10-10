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
   $query3 ="
SELECT `imdb_movie_has_genre`.`imdb_movie_id`, `imdb_genre`.`name`
FROM `imdb_genre`
LEFT JOIN `imdb_movie_has_genre`
    ON `imdb_movie_has_genre`.`imdb_genre_id` = `imdb_genre`.`id`
      WHERE `imdb_movie_id` = ?
";
$statement3 = db::query($query3, [$_GET['id']]);
$data3 = $statement3->fetchAll();

//var_dump($data3);
?>

<?php foreach($data3 as $imdb_genre) : ?>
     <?php echo $imdb_genre['name'].','; ?> 
    
    
    <?php endforeach; ?>





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