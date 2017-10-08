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

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#top">Movie</a>
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
                        <a class="nav-link" href="#cast">Cast</a>
                    </li>

                    
                </ul>

            </div>
        </nav>


        <section id="top">
            <div class="row ">


                
                <div class="col-4 p-3 mb-2 text-white">

                    <img class="rounded mx-auto d-block img-fluid" src="img/<?php echo $_GET['id']?>.jpg" alt="">

                </div>

                <div class="col-4 p-3 mb-2 text-white ">
                    <h1><?php echo $data[0]['name']?></h1>
                    <h6>Run time: <?php echo $data[0]['length']?> min</h6>
                    <h6>Gender:</h6>
                    <h6>Released: <?php echo $data[0]['year']?></h6>
                    <h6>Rating: &#9733 <?php echo $data[0]['rating']?>/10</h6>
                    <h6>Votes: <?php echo $data[0]['votes_nr']?></h6>
                    <br>
                    <p><b><?php echo $data2[0]['small_plot']?></b></p>
                </div>

              
                
            </div>
        </section>



    

        <section id="trailer">
            <div class="row">

            <div class="col p-3 mb-2 border rounded bg-dark text-white">
                    <h5>Directors: </h5>
                    <h5>Cast: </h5>
                </div>
                <div class="col-4 p-5 mb-2 border rounded bg-dark text-white">
                    <div class="embed-responsive embed-responsive-16by9">
                        
                        <iframe class="embed-responsive-item" src="<?php echo $data2[0]['trailer']?>" frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>

               
               
            </div>
        </section>

        <section id="plot">
            <div class="row">
                <div class="col p-3 mb-2 border rounded bg-dark text-white">
                    <h2>Plot:</h2>
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







 