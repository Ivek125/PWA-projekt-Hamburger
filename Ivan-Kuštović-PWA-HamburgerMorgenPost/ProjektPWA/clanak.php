<?php
$dbc = mysqli_connect('localhost', 'root', '', 'HamburgerMorgenDB') or
die ('Error connecting to MySQL server' . mysqli_connect_error());


$result = mysqli_query($dbc, "SELECT * FROM articles WHERE article_id = $_GET[id]");
$article = mysqli_fetch_assoc($result);

  //article_id, title, published_at, image, content
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hamburger Morgenpost</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .okvir img{
            width: 100%; 
        }
        .okvir{
            padding: 15px;
        }
        .container{
            width: 60%;
        }
    </style>
  </head>
  <body>
    <?php

    require "./header.php";
    
    ?>
   

    <main class="clanakPozadina">
     <div class="container">      
        <div class="naslovObjave">
            <div class="okvir">
            <h1><?= $article["title"] ?></h1>
        </div>
        </div>
        <div class="vrijemeObjave">
            <div class="okvir">
                <p><?= $article["published_at"] ?></p>
            </div>
        </div>
        <div class="slikaObjave">
            <div class="okvir">
                <img src="./slike/<?= $article["image"] ?>">
            </div>
        </div>
        <div class="sadrzajObjave">
            <div class="okvir">
                <p><?= $article["content"] ?></p>
            </div>
        </div>
    </div>             
    </main>


    <?php

    require "./footer.php";
    ?>
  </body>
</html>

