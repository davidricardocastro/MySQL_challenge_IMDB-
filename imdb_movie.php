<?php


//require database library
require_once 'db.php';

$_GET;

//write SQL query
$query = "
    SELECT *
    FROM `imdb_movie`
    WHERE `imdb_movie`.`imdb_id`=?
    ";


    //movie id on database
$film_id=$_GET['id'];

//echo $film_id;



//run the query
$statement = db::query($query, [$film_id]);

//fetch the results
$data = $statement->fetchAll();
 
//var_dump($data);

//output the results


//var_dump($_GET);
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
    


    <ul>

    <?php foreach($data as $imdb_movie) : ?>
    <li> <?php echo '<h1> '.$imdb_movie['name'].'</h1>'; ?> </li>
    <li> <?php echo '<h3>Year: '.$imdb_movie['year'].'</h3>'; ?> </li>
    <li> <?php echo '<h3>IMDb rating: '.$imdb_movie['rating'].'</h3>'; ?> </li>
    <li> <?php echo '<h3>Number of votes: '.$imdb_movie['votes_nr'].'</h3>'; ?> </li>
    <li> <?php echo '<h3>Length: '.$imdb_movie['length'].'</h3>'; ?> </li>

    <?php echo '<br>'; ?>
    <?php endforeach; ?>
    
    </ul>


</body>
</html>