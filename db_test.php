<?php

//require database library
require_once 'db.php';



$query6 ="
SELECT `imdb_movie_has_person`.`imdb_movie_id`, `imdb_person`.`fullname`
FROM `imdb_movie_has_person`
LEFT JOIN `imdb_person`
    ON `imdb_movie_has_person`.`imdb_person_id` = `imdb_person`.`imdb_id`
    WHERE `imdb_movie_id` = 110912
";


$statement6= db::query($query6);
$data6 = $statement6->fetchAll();

//var_dump($data6);


//query for cast
$query7 ="
SELECT `imdb_movie_has_person`.`imdb_movie_id`, `imdb_person`.`fullname`, `imdb_position`.`name`
FROM `imdb_movie_has_person`
JOIN `imdb_person` ON `imdb_movie_has_person`.`imdb_person_id` = `imdb_person`.`imdb_id`
JOIN `imdb_position` ON `imdb_movie_has_person`.`imdb_person_id` = `imdb_person`.`imdb_id`


WHERE `imdb_movie_id` = 103064 AND `id` = 255 
";


$statement7= db::query($query7);
$data7 = $statement7->fetchAll();

//[$_GET['id']]


//var_dump($data7);
//echo ($data6[0]['label']);

//echo $data6[0]['fullname'];

//foreach($data6 as $x => $x_value) {
//echo $data7[$x]['name'].' '.$data6[$x]['fullname'];
//echo "<br>"; 
//}


//foreach($data6 as $x => $x_value) {

//   echo $data6[$x]['fullname'];;
//   echo "<br>";  
       
//}



//query for actores and roles 
//SELECT imdb_movie_has_person.description,
//imdb_movie_has_person.imdb_position_id, imdb_person.fullname
//FROM imdb_movie_has_person INNER JOIN imdb_person
//ON imdb_movie_has_person.imdb_person_id = imdb_person.imdb_id
//WHERE imdb_movie_has_person.imdb_movie_id = 103064 AND imdb_movie_has_person.imdb_position_id = 254



//query for actores, roles and description(cast, director, etc)
$query8 ="
SELECT imdb_movie_has_person.description,
imdb_person.fullname, imdb_position.name
FROM imdb_movie_has_person INNER JOIN imdb_person
ON imdb_movie_has_person.imdb_person_id = imdb_person.imdb_id
INNER JOIN imdb_position
ON imdb_movie_has_person.imdb_position_id = imdb_position.id
WHERE imdb_movie_has_person.imdb_movie_id = 103064 AND imdb_movie_has_person.imdb_position_id = 255
";


$statement8= db::query($query8);
$data8 = $statement8->fetchAll();

//var_dump($data8);

foreach($data8 as $x => $x_value) {
       echo $data8[$x]['name'].' '.$data8[$x]['fullname'].' '.$data8[$x]['description'].'<br>';
    //var_dump($x_value);
      echo "<br>";  
}
        
     
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


<ul>

<!--
//<?php
//foreach($data6 as $x => $x_value) {
//    echo '<li>'.$x_value.'</li>';
//    echo "<br>";  ?> 
       
    
 //   <?php// endforeach; ?>
    
  //  </ul>

-->




</body>
</html>