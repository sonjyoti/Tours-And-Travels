<?php 
    session_start();
    if (!isset($_SESSION['customerId'])) {
        header ("Location: ../index.php");
    }
