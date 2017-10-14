<?php

//require database library
require_once 'db.php';

//write SQL query
$query = "
    SELECT *
    FROM `imdb_movie`
    WHERE `imdb_movie`.`imdb_id`=?
    ";

//echo $film_id;

//run the query
$statement = db::query($query, [$_GET['id']]);

//fetch the results
$data = $statement->fetchAll();
 
//var_dump($data[0]['name']);


//var_dump($_GET);

$query2 = "
SELECT *
FROM `imdb_movie_data_web`
WHERE `imdb_movie_data_web`.`imdb_id`=?
";
$statement2 = db::query($query2, [$_GET['id']]);
$data2 = $statement2->fetchAll();

//query for movie genre
$query3 ="
SELECT `imdb_movie_has_genre`.`imdb_movie_id`, `imdb_genre`.`name`
FROM `imdb_genre`
LEFT JOIN `imdb_movie_has_genre`
    ON `imdb_movie_has_genre`.`imdb_genre_id` = `imdb_genre`.`id`
      WHERE `imdb_movie_id` = ?
";
$statement3 = db::query($query3, [$_GET['id']]);
$data3 = $statement3->fetchAll();




//query for movie type
$query4 ="
SELECT `imdb_movie`.`imdb_movie_type_id`, `imdb_movie_type`.`name`
FROM `imdb_movie`
LEFT JOIN `imdb_movie_type`
 ON `imdb_movie`.`imdb_movie_type_id` = `imdb_movie_type`.`id`
   WHERE `imdb_id` = ?
";
$statement4 = db::query($query4, [$_GET['id']]);
$data4 = $statement4->fetchAll();

$query5 ="
SELECT `imdb_movie`.`imdb_movie_status_id`, `imdb_movie_status`.`label`
FROM `imdb_movie`
LEFT JOIN `imdb_movie_status`
    ON `imdb_movie`.`imdb_movie_status_id` = `imdb_movie_status`.`id`
      WHERE `imdb_id` = ?
";
$statement5 = db::query($query5, [$_GET['id']]);
$data5 = $statement5->fetchAll();




//query for cast on movie
$query8 ="
SELECT imdb_movie_has_person.description,
imdb_person.fullname, imdb_position.name
FROM imdb_movie_has_person INNER JOIN imdb_person
ON imdb_movie_has_person.imdb_person_id = imdb_person.imdb_id
INNER JOIN imdb_position
ON imdb_movie_has_person.imdb_position_id = imdb_position.id
WHERE imdb_movie_has_person.imdb_movie_id = ? AND imdb_movie_has_person.imdb_position_id = 254
";


$statement8= db::query($query8, [$_GET['id']]);
$data8 = $statement8->fetchAll();

//query for directores
$query9 ="
SELECT imdb_movie_has_person.description,
imdb_person.fullname, imdb_position.name
FROM imdb_movie_has_person INNER JOIN imdb_person
ON imdb_movie_has_person.imdb_person_id = imdb_person.imdb_id
INNER JOIN imdb_position
ON imdb_movie_has_person.imdb_position_id = imdb_position.id
WHERE imdb_movie_has_person.imdb_movie_id = ? AND imdb_movie_has_person.imdb_position_id = 255
";


$statement9= db::query($query9,  [$_GET['id']]);
$data9 = $statement9->fetchAll();

//query for producers
$query10="
SELECT imdb_movie_has_person.description,
imdb_person.fullname, imdb_position.name
FROM imdb_movie_has_person INNER JOIN imdb_person
ON imdb_movie_has_person.imdb_person_id = imdb_person.imdb_id
INNER JOIN imdb_position
ON imdb_movie_has_person.imdb_position_id = imdb_position.id
WHERE imdb_movie_has_person.imdb_movie_id = ? AND imdb_movie_has_person.imdb_position_id = 257
";


$statement10= db::query($query10,  [$_GET['id']]);
$data10 = $statement10->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">

        

    <style>

    </style>


</head>

<body>

    <div class="container-fluid bg-dark">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">Movies</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    

                    <li class="nav-item">
                        <a class="nav-link" href="#trailer">Trailer <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#plot">Plot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#credits">Credits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search</a>
                    </li>
                    
                </ul>

            </div>
        </nav>


        <section id="top">
            <div class="row ">


                
                <div class="col-md-3 col-12 p-3 mb-2 text-white text-center">

                    <img class="rounded  img-fluid" src="img/<?php echo $_GET['id']?>.jpg" alt="">

                </div>

                <div class=" col-md-4 col-12 p-3 mb-2 text-white ">
                    <h1><?php echo $data[0]['name']?></h1>
                    <h6>Run time: <?php echo $data[0]['length']?> min</h6>
                    <h6>Gender:<?php foreach($data3 as $imdb_genre) : ?>
                                 <?php echo $imdb_genre['name'].','; ?> 
                                 <?php endforeach; ?></h6>
                    <h6>Released: <?php echo $data[0]['year']?></h6>
                    <h6>Rating: &#9733 <?php echo $data[0]['rating']?>/10</h6>
                    <h6>Votes: <?php echo $data[0]['votes_nr']?></h6>
                    <h6>Type: <?php echo ($data4[0]['name']); ?> </h6>
                    <h6>Status: <?php echo ($data5[0]['label']);?> </h6>
                   
                    
                </div>

              <div class=" col-12 p-3 mb-2 text-white">
              <p><b><?php echo $data2[0]['small_plot']?></b></p>
            </div>
        </section>



    

        <section id="credits">
            <div class="row">

            <div class="col-md-8 col-12 p-3 mb-2 border rounded bg-dark text-white">
                    <h5>Directed by: </h5>
                    
                    <?php 
                        foreach($data9 as $x => $x_value) {
                        echo $data9[$x]['fullname'].'<br>';
    
                        }



                        ?>

                    <h5>Produced by: </h5>
                    
                    <?php 
                        foreach($data10 as $x => $x_value) {
                        echo $data10[$x]['fullname'].'<br>';
    
                        }



                        ?>


                    <h5>Cast: </h5>
                    <?php foreach($data8 as $x => $x_value) {
                    echo $data8[$x]['fullname'].' as '.$data8[$x]['description'];
    
                    echo "<br>";  

                  
       
                            }
                          ?>  
                  



                </div>
                <div id="trailer" class="col-md-4 col-12 p-5 mb-2 border rounded bg-dark text-white">
                    <div class="embed-responsive embed-responsive-16by9">
                        
                        <iframe class="embed-responsive-item" src="<?php echo $data2[0]['trailer']?>" frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>

               
               
            </div>
        </section>

        <section id="plot">
            <div class="row">
                <div class="col p-3 mb-2 border rounded bg-dark text-white">
                    <h5>Plot:</h5>
                    <p class="text-justify">
                    <?php echo $data2[0]['plot']?>
                    </p>
                </div>
            </div>
        </section>
        <section id="cast">

 
        <section id="developed">

            <div class="row ">
                <div class="col  p-3 mb-2">
                    <h6>
                        <p class="text-right">Developed by <b>David Castro</b> </p>
                    </h6>
                </div>
            </div>


        </section>
        </div>






        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>



</body>

</html>







 