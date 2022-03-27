<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: /app-perritos-parcial/index.php');
?>
