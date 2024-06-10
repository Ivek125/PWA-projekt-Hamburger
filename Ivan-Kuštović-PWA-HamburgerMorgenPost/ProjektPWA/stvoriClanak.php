<?php
$dbc = mysqli_connect('localhost', 'root', '', 'HamburgerMorgenDB') or
die ('Error connecting to MySQL server' . mysqli_connect_error());


$result = mysqli_query($dbc, "SELECT * FROM articles ");
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
        label {
            display: block;
            margin-top: 5px;
            color: #555;
            font-size: 20px;
        
        }
        

    </style>
  </head>
  <body>
    <?php

    require "./header.php";
    
    ?>
   

   
    
    <main class="clanakPozadina">
     <div class="container">      
     <h1>Dodaj novi članak</h1>
    <form action="postaviClanak.php" method="POST" enctype="multipart/form-data">
        <label for="title">Naslov:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="image">Slika:</label><br>
        <input type="file" id="image" name="image" required><br><br>

        <label for="content">Sadržaj:</label><br>
        <textarea id="content" name="content" rows="10" cols="30" required></textarea><br><br>

        <label for="shortContent">Kratki sadržaj:</label><br>
        <textarea id="shortContent" name="shortContent" rows="5" cols="30" required></textarea><br><br>

        <label for="category">Kategorija:</label><br>
        <select id="category" name="category" required>
            <option value="Sport">Sport</option>
            <option value="Tech">Tech</option>
            <option value="Show">Show</option>
        </select><br><br>

        <input class="stvarajMali" type="submit" value="Stvori">
    </form>
       
    </div>             
    </main>


    <?php

    require "./footer.php";
    ?>
  </body>
</html>
