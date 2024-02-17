<?php 
session_start();
if (isset($_SESSION['adminId'])) {
    header ("Location: admin/index.php");
}

else if (isset($_SESSION['customerId'])) {
    header ("Location: customer/index.php");
}
