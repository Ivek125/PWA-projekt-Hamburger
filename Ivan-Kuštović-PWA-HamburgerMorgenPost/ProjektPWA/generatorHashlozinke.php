<?php
$password = "password"; // Unesite željenu lozinku
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
echo $hashed_password;
?>
