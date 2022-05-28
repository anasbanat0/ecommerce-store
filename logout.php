<?php
session_start();
unset($_SESSION['customer_email']);
session_destroy();
header('location:index.php');


