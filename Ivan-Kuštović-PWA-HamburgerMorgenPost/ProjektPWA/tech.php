<?php
$dbc = mysqli_connect('localhost', 'root', '', 'HamburgerMorgenDB') or
die ('Error connecting to MySQL server' . mysqli_connect_error());
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hamburger Morgenpost</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <?php
  require "./header.php";
  ?>

    <main>
      <div class="container">
        <div class="section">
          <h2>Tech</h2>

        <?php  
        $query = "SELECT * FROM articles WHERE category='Tech'";
        $result = mysqli_query($dbc, $query);  
        require "./vijesti.php";
        ?>

    
      </div>
    </main>

    <?php
    require "./footer.php";
    ?>
  </body>
</html>
