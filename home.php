<?php

//require database library
require_once 'db.php';





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


</head>
<body>
<div class="container">

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



<div class="row">
<div class="col-12">

<h1>Movies</h1>
</div>

<div class="col">
<a href="imdb_movie.php?id=317219"><img src="img/317219.jpg" alt="Cars"></a>




<a href="imdb_movie.php?id=2358891"><img src="img/2358891.jpg" alt="La grande bellezza"></a>

<a href="imdb_movie.php?id=816692"><img src="img/816692.jpg" alt="Interstellar"></a>

<a href="imdb_movie.php?id=110912"><img src="img/110912.jpg" alt="Pulp Fiction"></a>

<a href="imdb_movie.php?id=1000774"><img src="img/1000774.jpg" alt="Sex and the Cit">y</a>

<a href="imdb_movie.php?id=420223"><img src="img/420223.jpg" alt="Stranger Than Fiction"></a>

<a href="imdb_movie.php?id=383028"><img src="img/383028.jpg" alt="Synecdoche, New York"></a>

<a href="imdb_movie.php?id=103064"><img src="img/103064.jpg" alt="Terminator 2: Judgment Day"></a>

<a href="imdb_movie.php?id=1454029"><img src="img/1454029.jpg" alt="The Help"></a>


<a href="imdb_movie.php?id=1663202"><img src="img/1663202.jpg" alt="The Revenant"></a>


<a href="imdb_movie.php?id=1291584"><img src="img/1291584.jpg" alt="Warrior"></a>
<a href="imdb_movie.php?id=94336"><img src="img/94336.jpg" alt="Withnail and I"></a>


</div>




</div>


</div>




</body>
</html>