<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav>
        <img id="naslov-logo" src="slike/mopo.png" />
        <div class="mijesan">
            <!--<div class="bijelo"></div>-->
            <div class="crveno">
                <a href="index.php">Home</a>
                <a href="show.php">Show</a>
                <a href="tech.php">Tech</a>
                <a href="sport.php">Sport</a>
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
                    <a href="adminLogin.php">Administracija</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                  <a href="stvoriClanak.php">Dodaj Članak</a>
                <?php endif; ?> 
                <a href="#">Video</a>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <a href="adminClanci.php">Upravljanje člancima</a>
                        <a href="dodajKorisnika.php">Upravljanje korisnicima</a>
                    <?php endif; ?>
                    <a href="logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
